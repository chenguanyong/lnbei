<?php
namespace app\netletter\controller;

use app\common\controller\Base;
class Message extends Base
{
    //获取message信息列表
    public function index(){
         return $this->fetch("index"); 
    }
    //删除message信息
    public function deleMessage(){
        
    }
    //发送消息
    public function sendMessage(){
        
    }
    //保存消息
    public function addMessage(){
        
    }
    //更新消息
    public function updateMessage(){
        
    }
}

?>