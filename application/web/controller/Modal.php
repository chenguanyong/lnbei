<?php
//|***************************************************************
//|lnbei
//+---------------------------------------------------------------
//|Copyright (c) 2017~2099 http://lnbei.net All rights reserved.
//+---------------------------------------------------------------
//|Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
//+---------------------------------------------------------------
//|@auth zhuoyue(993238441@qq.com)
//+---------------------------------------------------------------
//|模态框控制类
//|***************************************************************



















namespace app\web\controller;

use app\common\controller\Base;
class Modal extends Base 
{
   public function index(){
       $modal = input("modal");
       $modalID = input("post.modalID");
       $viewData = array("id"=>$modalID);
       $this->assign("viewData",$viewData);
       return $this->fetch($modal);
   } 
   
}

?>