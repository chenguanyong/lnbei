<?php
namespace app\mall\controller;
use think\Controller;
use app\mall\model\GoodsModel;
use app\mall\model\GoodCatsModel;
use app\member\model\BrandsModel;
use app\admin\controller\Base;

class Goods extends Base
{
    /**
     * [index 商品列表首页]
     * @return [type] [description]
     * @author
     */
    public function index()
    {
        return $this->fetch();
    }
    
    /**
     * [getGoodsListByPage 商品列表]
     * @return [type] [description]
     * @author
     */
    public function getGoodsListByPage()
    {
		$key = input('get.id');
		$map = [];
		$dic = new GoodsModel();
		$dics = $dic->get(['goodsId'=>$key]);
		$Nowpage = input('get.page') ? input('get.page'):1;
		$limits = 10;// 获取总条数
		$count = $dic->getGoodsSize($key);  //总数据
		$allpage = intval(ceil($count / $limits));
		$lists = $dic->getGoodsByParent($key, $limits, $Nowpage);
		$this->assign('Nowpage', $Nowpage); //当前页
		$this->assign('allpage', $allpage); //总页数
		$this->assign('count', $count);
		$this->assign('val', $key);
		$this->assign('lists', $lists);
		return $this->fetch('list');		
    }
   
    /**
     * [addGoods 添加商品页面]
     * @return [type] [description]
     * @author
     */
    public function addGoods(){
        $id = input('get.id'); 
        if($id != 0 ){
            $goodCats = new GoodCatsModel();
            $result = $goodCats -> parentName($id);
            $nodename = $result['0']['catName'];
            $this->assign('nodename', $nodename);
        }else{
            $this->assign('nodename', '顶级分类');
        }
        $brand = new BrandsModel();
        $brands = $brand -> getindex();      
        $this->assign('id', $id);
        $this->assign('brands', $brands);
        return $this->fetch();
    }
    
    /**
     * [ajaxAddGoods 添加商品页面]
     * @return [type] [description]
     * @author
     */
    public function ajaxAddGoods(){
        $param = input('post.');
        //门店ID
        $shopId = '1';
        
        $data = array();
        $catid = $param['nodeID'];
        $goodsCatIdPath = $catid;
        $i = 0;
        $arr = array();
        if($catid == 0 ){
            $goodsCatIdPath = 0;
            $data['shopCatId1'] = 0;
            $data['shopCatId2'] = 0;            
        }else{
            //获取分类路径
            $goodcats = new GoodCatsModel();
            while(true){
                $arr[$i] = $catid;
                $catid = $goodcats -> getCatPath($catid);                
                $goodsCatIdPath = $goodsCatIdPath . ' _ ' .$catid;
                $i++;
                if($catid == 0){
                    break;
                }
            }
            for($k=0; $k < 2; $k++){
                $data['shopCatId'.($k+1)] = $arr[$k];
            }                               
        }
        $data['goodsSn'] = $param['goodsSn'];
        $data['productNo'] = $param['productNo'];
        $data['goodsName'] = $param['goodsName'];
        $data['marketPrice'] = $param['marketPrice'];
        $data['shopPrice'] = $param['shopPrice'];
        $data['goodsStock'] = $param['goodsStock'];
        $data['shopId'] = $shopId;
        $data['goodsUnit'] = $param['goodsUnit'];
        $data['goodsCatIdPath'] = $goodsCatIdPath;
        $data['goodsCatId'] = $param['nodeID'];
        $data['brandId'] = $param['brandID'];
        $data['goodsDesc'] = $param['goodsDesc'];
        $data['saleTime'] = date("Y-m-d H:i:s", time());
        $data['createTime'] = date("Y-m-d H:i:s", time());
        $small = $param['small'];
        $small = str_replace('\\','/',(string)$small);
        $small = str_replace('&quot;','"', (string)$small);
        $smalldata = json_decode(''.$small.'');
        foreach ($smalldata as $value){
            $data['goodsImg'] = $value->imagename;
        }
        $goods = new GoodsModel();
        $result = $goods -> addGoods($data);        
        if($result != null){
            return json(['code' => 1, 'data' => '', 'msg' => '添加成功']);
        }else{
            return json(['code' => 0, 'data' => '', 'msg' => '添加失败']);
        };
    }

    /**
     * [delGoods 删除商品]
     * @return [type] [description]
     * @author
     */
    public function delGoods(){ 
        $goodsId = input('post.goodsId');
        //var_dump($goodsId);
        $goods = new GoodsModel();
        $result = $goods -> doDelGoods($goodsId);
        if($result){
            return json(['code' => 1, 'data' => '', 'msg' => '删除成功']);
        }else{
            return json(['code' => 0, 'data' => '', 'msg' => '删除失败']);           
        }
    }
    
    /**
     * [editGoods  修改商品信息页面]
     * @return [type] [description]
     * @author
     */
    public function editGoods(){
        $goodsId = input('get.id');
        $goods = new GoodsModel();
        $result = $goods -> getGoodsByid($goodsId);
        foreach($result as $value){        
        }
        $brand = new BrandsModel();
        $brands = $brand -> getindex(); 
        $this -> assign('gid',$goodsId);
        $this -> assign('value', $value);
        $this-> assign('brands', $brands);
        return $this -> fetch();
    }
    
    /**
     * [ajaxeditgoods  修改商品信息]
     * @return [type] [description]
     * @author
     */
    public function ajaxEditGoods(){
        $param = input('post.');
        $data = array();
        $goodsId = $param['nodeID'];
        $data['goodsSn'] = $param['goodsSn'];
        $data['productNo'] = $param['productNo'];
        $data['goodsName'] = $param['goodsName'];
        $data['marketPrice'] = $param['marketPrice'];
        $data['shopPrice'] = $param['shopPrice'];
        $data['goodsStock'] = $param['goodsStock'];
        $data['goodsUnit'] = $param['goodsUnit'];
        $data['goodsDesc'] = $param['goodsDesc'];
        $data['createTime'] = date("Y-m-d H:i:s", time());
        $small = $param['small'];
        if(strlen($small) != 1){
            $small = str_replace('\\','/',(string)$small);
            $small = str_replace('&quot;','"', (string)$small);
            $smalldata = json_decode(''.$small.'');
            foreach ($smalldata as $value){
                $data['goodsImg'] = $value->imagename;
            }
        }
        $goods = new GoodsModel();
        $result = $goods -> editGoods($data, $goodsId);
        if($result != null){
            return json(['code' => 1, 'data' => '', 'msg' => '修改成功']);
        }else{
            return json(['code' => 0, 'data' => '', 'msg' => '修改失败']);
        };
    }
}