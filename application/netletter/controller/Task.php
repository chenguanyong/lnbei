<?php
namespace app\netletter\controller;

use app\common\controller\Base;
class Task extends Base
{
    //获取Task信息列表
    public function index(){
       return $this->fetch("index"); 
    }
    //删除Task信息
    public function deleTask(){
        
    }
    //发送消息
    public function sendTask(){
        
    }
    //保存消息
    public function addTask(){
        
    }
    //更新消息
    public function updateTask(){
        
    }
}

?>