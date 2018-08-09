<?php

namespace com\lnbei\wechat;
use com\lnbei\wechat\base\JSSDK;

class WechatBase extends JSSDK{
    
    public function __construct($appId,$appSecret){
       
        parent::__construct($appId, $appSecret);
    }
    //获取AccessToken值
    public function getAccess_tocken(){
        
        return parent::getAccessToken();
    }
    //获取wx接口配置信息
    public function getjssdk(){
        
        return parent::getSignPackage();
    }
}


?>