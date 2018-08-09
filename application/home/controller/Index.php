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
//|前端首页控制类
//|***************************************************************
namespace app\home\controller;
use app\common\home\Base;
use think\Controller;
class Index extends Base
{
    public function Index(){
        
        return $this->fetch('index');
    }
}

?>