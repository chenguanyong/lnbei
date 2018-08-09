<?php
namespace com\lnbei\wechat\user;

use com\lnbei\wechat\WechatBase;
class WechatUserGroup extends WechatBase
{
    //构造函数
    public function __construct($appId,$appSecret){
       
        parent::__construct($appId, $appSecret);
    }
    /**
     * 创建分组
     * http请求方式: POST（请使用https协议）
        https://api.weixin.qq.com/cgi-bin/groups/create?access_token=ACCESS_TOKEN
        POST数据格式：json
        POST数据例子：{"group":{"name":"test"}}
     * @param string $name
     */
    public function buildGroup($name = ""){
        $access_token = $this->getAccess_tocken();
        $url = "https://api.weixin.qq.com/cgi-bin/groups/create?access_token=" . $access_token;
        if($access_token == null){
            return null;
        }
        if($name == "" ){
            return null;
        }else{
            $data = array("group"=>array("name"=>$name));
        }
        return $this->sendPost($data, $url);
    }
    /**
     * http请求方式: GET（请使用https协议）
       https://api.weixin.qq.com/cgi-bin/groups/get?access_token=ACCESS_TOKEN
     * 查询所有分组
     */
    public function getAllGroup(){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://api.weixin.qq.com/cgi-bin/groups/get?access_token=" . $access_token;
        if($access_token == null){
            return null;
        }
        return $this->sendGet($url);
    }
    /**
     * 查询用户所在分组
                 通过用户的OpenID查询其所在的GroupID。 接口调用请求说明
        http请求方式: POST（请使用https协议）
        https://api.weixin.qq.com/cgi-bin/groups/getid?access_token=ACCESS_TOKEN
        POST数据格式：json
        POST数据例子：{"openid":"od8XIjsmk6QdVTETa9jLtGWA6KBc"}
     * @param string $openID
     */
    public function getUserInGroup($openID = ""){
        $access_token = $this->getAccess_tocken();
        $url = "https://api.weixin.qq.com/cgi-bin/groups/getid?access_token=" . $access_token;
        if($access_token == null){
            return null;
        }
        if($openID == "" ){
            return null;
        }else{
            $data = array("openid"=>$openID);
        }
        return $this->sendPost($data, $url);        
    }
}

?>