<?php
namespace com\lnbei\wechat\user;
use com\lnbei\wechat\WechatBase;

class WechatUser extends WechatBase
{
    public $appId;
    public $appSecret;
    //构造函数
    public function __construct($appId,$appSecret){
        parent::__construct($appId, $appSecret);
        $this -> appId = $appId;
        $this -> appSecret =$appSecret;   
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
    /**
     * http请求方式: POST（请使用https协议）
        https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=ACCESS_TOKEN
        POST数据格式：JSON
        POST数据例子：
        {
        	"openid":"oDF3iY9ffA-hqb2vVvbr7qxf6A0Q",
        	"remark":"pangzi"
        }
     * @param string $next_openid
     * @return boolean|string|unknown|mixed
     * 
     */
    public function setUserRemark($openid ="",$remark=""){
        $access_token = $this->getAccess_tocken();
        $url = "https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=" . $access_token;
        if($openid == "" || $remark == "" ){
            return null;
        }else{
            $data = array("openid"=>$openid,"remark"=>$remark);
        }
        return $this->sendPost($data, $url);
    }
/**
 * 获取用户基本信息（包括UnionID机制）
 * http请求方式: GET
   https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN
 * @param unknown $openID
 * @param string $lang
 * @return boolean|string|unknown|mixed
 */
    public function getUserBaseInfo($openID,$lang = "zh_CN"){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = " https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $access_token . "&openid=" . $openID . "&lang=" . $lang;
        return $this->sendGet($url);
    }
    /**
     * 批量获取用户基本信息
            接口调用请求说明
            
            http请求方式: POST
            https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=ACCESS_TOKEN
            POST数据示例
            
            {
                "user_list": [
                    {
                        "openid": "otvxTs4dckWG7imySrJd6jSi0CWE", 
                        "lang": "zh-CN"
                    }, 
                    {
                        "openid": "otvxTs_JZ6SEiP0imdhpi50fuSZg", 
                        "lang": "zh-CN"
                    }
                ]
            }
     */
    public function getUserBaseInfoList($userlist = array()){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=" . $access_token;
        if(empty($userlist)){
            return null;
        }
        $userobj = array("user_list"=>$userlist);
        //$data = json_encode($userobj);
        return $this->sendPost($userobj, $url);
    }

    //获取用户信息 （UserID机制）
    public function getOneUser($code){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){

            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token=" . $access_token . "&code=" . $code;
        return $this -> sendGet($url); 

    }


    //获取成员详细信息
    public function getUserinfo($data){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        } 
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserdetail?access_token=" . $access_token;
        return $this -> Post_user_ticket($data, $url);         
    }

    //创建成员
    public function createUser($data){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        } 
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=" . $access_token;  
        return $this-> sendPost($data, $url);
    } 

    //部门列表
    public function getdepart(){
        $access_token = $this->getAccess_tocken();
        //echo $access_token;
        if($access_token == null){
            return false;
        } 
        $url = "https://qyapi.weixin.qq.com/cgi-bin/department/list?access_token=" . $access_token;  
        return $this-> sendGet($url);
    } 

    //创建用户会话
    public function createHui($data){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return false;
        }         
        $url = "https://qyapi.weixin.qq.com/cgi-bin/chat/create?access_token=" . $access_token;
        return $this->sendPost($data, $url);
    } 
    
}

?>