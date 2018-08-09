<?php
namespace com\lnbei\wechat\msg;

use com\lnbei\wechat\WechatBase;
class WeMsg extends WechatBase
{
    //构造函数
    public function __construct($appId,$appSecret){
         
        parent::__construct($appId, $appSecret);
    }
    //发送消息
    public function sendMsg($data){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/message/send?access_token=" . $access_token;
        if($data == ""){
            return null;
        }
        return $this->sendPost($data, $url);
        
    }
    //群发消息
    public function sendMsgAll($data){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/message/send?access_token=" . $access_token;
        if($data == ""){
            return null;
        }
        return $this->sendPost($data, $url);
    
    }
}

?>