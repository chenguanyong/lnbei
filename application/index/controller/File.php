<?php
namespace app\index\controller;
use think\controller;
use app\index\model\UserModel;
use think\View;
use think\Session;
use think\Request;
use app\common\controller\Base;


class File extends Base
{
    public function index(){

        return $this->fetch('index');
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