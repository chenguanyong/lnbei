<?php
namespace app\mall\model;
use think\Model;

class GoodsModel extends Model
{
    protected $name="goods";
    
    /**
     * [getGoodsByid 返回指定商品列表]
     * @return [type] [description]
     * @author
     */
    public function getGoodsByid($id){
        $goods = $this->where(['goodsId'=>$id,'dataFlag'=>1])->select();
        return $goods;
    }
    
    /**
     * [getGoodsSize 获取商品节点数量]
     * @return [type] [description]
     * @author
     */
    public function getGoodsSize($id){
    
        $count = $this->where(['goodsCatId'=>$id,'dataFlag'=>1])->count();
        return $count;
    }
    
    /**
     * [getGoodsByParent 返回所有字典指定字典]
     * @return [type] [description]
     * @author
     */
    public function getGoodsByParent($id,$limit,$start){
        $start = ($start-1)*$limit;
        $dic = $this->where(['goodsCatId'=>$id,'dataFlag'=>1])->limit($start,$limit)
        ->select();
        return $dic;
    }
    
    /**
     * [addGoods 添加商品]
     * @return [type] [description]
     * @author
     */
    public function addGoods($data){
        $result = $this->save($data);
        return $result;
    }

    /**
     * [doDelGoods 删除商品]
     * @return [type] [description]
     * @author
     */
    public function doDelGoods($id){
        $result = $this->save(["dataFlag"=>0],["goodsId"=>$id]);
        return $result;
    }
    
    /**
     * [editGoods 修改商品]
     * @return [type] [description]
     * @author
     */
    public function editGoods($data, $id){
        $result = $this->save($data,["goodsId"=>$id]);
        return $result;
    }
}