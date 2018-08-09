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
//|预览控制类
//|***************************************************************

namespace app\web\controller;

use app\common\controller\Base;
class DesignView extends Base
{
    public function index(){
       return $this->fetch("index"); 
    }
}

?>