<?php
namespace app\common\controller;
use think\Controller;
use auth\Auth;
use think\Session;
use com\lnbei\serialize\LBSerialize;
use app\common\widget\PageUser;
class Base extends Controller
{
    /**
     * 
     * @var PageUser
     */
    protected $__USER;
    protected function _initialize(){
        
        $UserID = CheckUser();
        if($UserID == false){
            return $this->fetch('Login/login');
        }
        $module     = strtolower(request()->module());
        $controller = strtolower(request()->controller());
        $action     = strtolower(request()->action());
        $url        = "#" . $module."/".$controller."/".$action;
        $uid = Session::get("UserID");
        $companyID = Session::get("companyID");
        $cityID = Session::get("CityID");
        $authobj = new Auth();
        $__USER__ = Session::get("__USER__");
        $this->__USER = LBSerialize::unSerialize($__USER__);
       // $rg = $authobj->getCompanyID($uid, $cityID, $companyID);
        if($uid != 1){
        if(!$authobj -> check($url, $uid, $companyID, $cityID)){
            if(request()->isAjax()){
                return json(['code'=>0,"msg"=>"您的权限不够"]);
            }else{
                return $this->error('您没有权限');
            }
        }
        }
    }
}

?>