<?php
namespace app\index\controller;

use app\common\controller\Base;
use app\index\model\AreaModel;
use think\Session;
use think\Db;
class Area extends Base
{
    //获取区域首页
    public function index(){
        
    }
    //获取城市列表
    public function ajaxGetArea(){
        
        $id = input("id");
        if($id == null){
            $id = 0;
        }
        $city = new AreaModel();
        $result = $city->getAreaList($id);
            $new_result=array();
            foreach($result as $k=>$v){
                $new_result[$k]['id']=$v['ID'];
                $new_result[$k]['pId']=(int)$v['parentID'];
                $new_result[$k]['name']=$v['name'];
                //$new_result[$k]['iconSkin']=$v['css'];
                $new_result[$k]['isParent']=$city->isParent($v['ID']);
               // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
               // $new_result[$k]['target'] = 'list_currency';
            }
        return json($new_result);
    }
    
    /**
     * 根据规则获取区域
     */
    public function getCityTree(){
        if(request()->isAjax()){
            $id = input("id");
            $companyID = input("companyID");
            $cityID = input("cityID");
            if($id == null){
                $id = 0;
            }
            if($companyID == null){
                $companyID = Session::get("companyID");
            }
            if($cityID == null){
                $cityID = Session::get("CityID");
            }
        
            $cityRule = new AreaModel();
            $result = $cityRule->getCityList(Session::get("UserID"),  $cityID, $companyID, $id ) ;
            if($result == null){
                return json(["code"=>"0","msg"=>"无结果"]);
            }
            $new_result = array();
            foreach($result['data'] as $k=>$v){
                $new_result[$k]['id']=$v['ID'];
                $new_result[$k]['pId']=(int)$v['parentID'];
                $new_result[$k]['name']=$v['name'];
                //$new_result[$k]['iconSkin']=$v['css'];checked:true
                $new_result[$k]['isParent']=self::IsCityParent($v['ID'],$result['rule']);
                // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
                // $new_result[$k]['target'] = 'list_currency';
                if($result['rule'] === "-1"){
                    $new_result[$k]['checked']=true;
                }else{
                    if(stripos($result['rule'],$v['ID']) === FALSE){
                        $new_result[$k]['checked']=false;
                    }else {
                        $new_result[$k]['checked']=true;
                    }
                }
            }
            return json($new_result);
        }else{
            return "你好";
        }
    }
    /**
     * 判断是父节点
     */
    private function IsCityParent($pid,$ids){
        $result = Db::name('city')->where(["parentID"=>$pid,"ID"=>["IN",$ids]])->count();
        if($result > 0){
            return true;
        }else{
            return false;
        }
    } 
}

?>