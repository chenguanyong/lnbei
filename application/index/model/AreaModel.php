<?php
namespace app\index\model;

use think\Model;
class AreaModel extends Model
{
    protected $table = "ce_city";
    public function getAreaList($id){
       return $this->where("parentID",$id)->select(); 
    }
    //判断是否父节点
    public function isParent($id){
        $result = $this->where("parentID",$id)->find();
        if($result == null){
            return false;
        }else{
            return true;
        }
    }
    public function getCityList($uid, $cityid, $companyid,$pid){
        
         $rule = new RuleModel();
         $ruleList = $rule->getCityID($uid, $cityid, $companyid);
         $menu = array();
         $ruleList == -1 ? "" : $menu['ID'] = ["IN",$ruleList];
         $menu['parentID'] = $pid;
         //var_dump($menu);
         //exit;
         $result = $this->where($menu)->select();
         if($result == null){
             return null;
         }
         return ["data"=>$result,"rule"=>$ruleList];
        
    }
}

?>