<?php
namespace com\lnbei\wechat\auth;

use com\lnbei\wechat\WechatBase;
class WechatAuth extends WechatBase
{
    //构造函数
    public function __construct($appId,$appSecret){
       
        parent::__construct($appId, $appSecret);
    }
    /**
     * 请求说明
        Https请求方式：GET
        https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token=ACCESS_TOKEN&code=CODE
     */
    public function getUserInfoByCode($code=""){
        $access_token = $this->getAccess_tocken();
        if($code == "" || $access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token=" . $access_token . "&code=" . $code;
        return $this->sendGet($url);
    }
    /**
     * 使用user_ticket获取成员详情
     * Https请求方式：POST
        https://qyapi.weixin.qq.com/cgi-bin/user/getuserdetail?access_token=ACCESS_TOKEN
     **/
    public function getUserInfoByUserTichet($user_ticket = ""){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserdetail?access_token=" . $access_token;
        if($user_ticket == ""){
            return null;
        }
        $userobj = array("user_ticket"=>$user_ticket);
        //$data = json_encode($userobj);
        return $this->sendPost($userobj, $url);
    } 
    /**
        userid转换成openid接口
      *  该接口使用场景为微信支付、微信红包和企业转账，企业号用户在使用微信支付的功能时，需要自行将企业号的userid转成openid。在使用微信红包功能时，需要将应用id和userid转成appid和openid才能使用。

                请求说明
                Https请求方式: POST
                
                https://qyapi.weixin.qq.com/cgi-bin/user/convert_to_openid?access_token=ACCESS_TOKEN
                
                请求示例
      */
     public function userIDToOpenID($userid,$agentid = ""){
         $access_token = $this->getAccess_tocken();
         if($access_token == null){
             return null;
         }
         $url = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserdetail?access_token=" . $access_token;;
         if($userid == ""){
             return null;
         }
         $userobj = array();
         if($agentid == ""){
            $userobj = array("userid"=>$userid); 
         }else{
            $userobj = array("userid"=>$userid,"agentid"=>$agentid); 
         }
         
         //$data = json_encode($userobj);
         return $this->sendPost($userobj, $url);         
     }
     /**openid转换成userid接口
        Https请求方式: POST
        
        https://qyapi.weixin.qq.com/cgi-bin/user/convert_to_userid?access_token=ACCESS_TOKEN
        
                 请求示例
        {
           "openid": "oDOGms-6yCnGrRovBj2yHij5JL6E"
        }

      */
     public function OpenIDTouserID($openid =""){
         $access_token = $this->getAccess_tocken();
         if($access_token == null){
             return null;
         }
         $url = "https://qyapi.weixin.qq.com/cgi-bin/user/convert_to_userid?access_token=" . $access_token;;
         if($openid == ""){
             return null;
         }
         $userobj = array("openid"=>$openid);
         return $this->sendPost($userobj, $url);
     }
     /**
      * 获取企业号登录用户信息

                    接口调用请求说明
            
            https请求方式: POST
            
            https://qyapi.weixin.qq.com/cgi-bin/service/get_login_info?access_token=ACCESS_TOKEN
            
            POST数据示例
            
            {
               "auth_code":"xxxxx"
            }
      * 
      */
     public function getLoginInfo($auth_code=""){
         $access_token = $this->getAccess_tocken();
         if($access_token == null){
             return null;
         }
         $url = "https://qyapi.weixin.qq.com/cgi-bin/service/get_login_info?access_token=" . $access_token;;
         if($auth_code == ""){
             return null;
         }
         $userobj = array("auth_code"=>$auth_code);
         return $this->sendPost($userobj, $url);         
     }
     
}

?>