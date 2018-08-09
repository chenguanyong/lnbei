<?php
namespace com\lnbei\serialize;
//|***************************************************************
//|lnbei
//+---------------------------------------------------------------
//|Copyright (c) 2017~2099 http://lnbei.net All rights reserved.
//+---------------------------------------------------------------
//|Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
//+---------------------------------------------------------------
//|@auth zhuoyue(993238441@qq.com)
//+---------------------------------------------------------------
//|对象序列化类
//|***************************************************************

class LBSerialize
{
    public static function serialize($value){
        
        return serialize($value);
    }  
    
    public static function unSerialize($str){
        return unserialize($str);
    } 
}

?>