<?php
namespace app\index\model;
use app\index\model\AuthModel;
use auth\Auth;
class RuleModel 
{
    //获取规则ID
    public function getRule($map,$roleID,$userID){
        $auth = new AuthModel();
        //var_dump($map);
        $rule = $auth->getAuthList($map['companyID'], $map['cityID'], $roleID, $userID);
        return $rule;
    }
    //获取部门ID
    public function getCompanyRule($uid, $cityid, $companyid){
        if ($uid == 1){
            return "-1";
        }
       $auth = new Auth();
       return $auth->getCompanyID($uid, $cityid, $companyid);
    }
    //获取区域ID
    public function getCityID($uid, $cityid, $companyid){
        if ($uid == 1){
            //return "-1";
        }
        $auth = new Auth();
        return $auth->getCityAuth($uid, $cityid, $companyid);
    }
}

?>