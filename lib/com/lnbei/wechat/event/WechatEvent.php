<?php
namespace com\lnbei\wechat\event;
use com\lnbei\wechat\WechatBase;

//事件推送
class WechatEvent extends WechatBase
{
    //构造函数
    public function __construct($appId,$appSecret){
       
        parent::__construct($appId, $appSecret);
    }

    public function joinEvent(){ 
        $access_token = $this->getAccess_tocken();
        $postDate = $HTTP_RAW_POST_DATA;
        $xmlObj= simplexml_load_string($postDate, "SimpleXMLElement", LIBXML_NOCDATA);
        var_dump($xmlObj);
        // "http://api.3dept.com/?msg_signature=ASDFQWEXZCVAQFASDFASDFSS&timestamp=13500001234&nonce=123412323"

    }
    //获取用户列表(https get 方式)
    public function getUserList($next_openid = ''){
        $access_token = $this->getAccess_tocken();
        $url = "";
        if($next_openid =='' ){
            $url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=" . $access_token ;
        }else{
            $url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=" . $access_token . "&next_openid=" . $next_openid;   
        }
        return $this->sendGet($url);
    }

    //创建成员
    public function createUser($data){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return false;
        } 
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=" . $access_token;  
        return $this-> sendPost($data, $url);
    }     
}

?>