<?php
namespace com\lnbei\wechat\material;

use com\lnbei\wechat\WechatBase;
class WechatMaterial extends WechatBase
{
    //构造函数
    public function __construct($appId,$appSecret){
         
        parent::__construct($appId, $appSecret);
    }
    //获取临时素材id
    public function getTempMaterial($mediaid =""){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/media/get?access_token=" . $access_token . "&media_id=" . $mediaid;
        if($mediaid == ""){
            return null;
        }
        return $this->sendGet($url);
    }
    //获取永久素材id
    public function getMaterial($mediaid =""){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        } 
        $url = "https://qyapi.weixin.qq.com/cgi-bin/material/get?access_token=" . $access_token . "&media_id=" . $mediaid;
        if($mediaid == ""){
            return null;
        }
        return $this->sendGet($url);
    }
    /**
     * 通过media_id删除上传的图文消息、图片、语音、文件、视频素材。

        请求说明
    Https请求方式: GET

    https://qyapi.weixin.qq.com/cgi-bin/material/del?access_token=ACCESS_TOKEN&media_id=MEDIA_ID
     * 
     */
    public function deleMaterial($mediaid =""){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/material/del?access_token=" . $access_token . "&media_id=" . $mediaid;
        if($mediaid == ""){
            return null;
        }
        return $this->sendGet($url);
    }
    /**
     * 修改永久素材
     */
    public function fixMaterial($data){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/material/update_mpnews?access_token=" . $access_token;
        if($data == ""){
            return null;
        }
        return $this->sendPost($data, $url);
    }
    
    /**
     * 
     * 
     */
    public function getMaterialSize(){
        $access_token = $this->getAccess_tocken();
        
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/material/get_count?access_token=" . $access_token ;

        return $this->sendGet($url);
        
    }
    /**
     * 
     * 
     */
    public function getMaterialList($data){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/material/batchget?access_token=" . $access_token ;
        if($data == null){
            return null;
        }
        return $this->sendPost($data,$url);
        
    }
}

?>