<?php
namespace app\index\controller;
use think\controller;
use app\index\model\UserModel;
use think\View;
use think\Session;
use think\Request;
use app\common\controller\Base;


class Member extends Base
{
    public function index(){
        return $this->fetch('index');
    }
    //通过部门id获取用户
    public function getUserByDepartID(){

  
    }
    
    public function editUser(){
         if(request()->isAjax()){

         }
        return $this->fetch();
    }
    //删除用户
    public function deleUser(){
   
    }
    //用户中心
    public function userProfile(){
        $view = new View();
        
        return $view->fetch('profile');
    }
    //时间线
    public function timeline(){
        
        $view = new View();
        
        return $view->fetch('timeline');
    }
}

?>