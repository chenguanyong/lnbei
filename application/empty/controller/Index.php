<?php
namespace app\common\controller;
use think\Controller;
class Index extends Controller
{
    /**
     * 普通请求
     *
     * */
    //首页
    public function index()
    {  
        return $this->fetch('index'); //$password;
    }
    //添加页面
    public function addPage(){
        
        
    }
    //删除页面
    public function deletePage(){
        
    }
    //更新页面
    public function updatePage(){
        
    }
    /**
     * ajax请求
     * 
     * */
    //添加ajax请求
    public function ajaxAdd(){
        //检查请求是否ajax
        if(!Request::instance()->isAjax()){
          return ;  
        }
        
    }
}
