<?php
namespace com\lnbei\wechat\menu;

use com\lnbei\wechat\WechatBase;
class WechatMenu extends WechatBase
{
    //添加菜单
    public function addMenu($data,$agentid){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/menu/create?access_token=" . $access_token . "&agentid=" . $agentid;
       return $this->sendPost($data, $url);
    }
    //获取菜单列表
    public function getWechatMenuList($agentid){
        $access_token = $this->getAccess_tocken();
        if($access_token == null){
            return null;
        }
        $url = "https://qyapi.weixin.qq.com/cgi-bin/menu/get?access_token=" . $access_token . "&agentid=".$agentid;
        return $this->sendGet($url);
    }
}

?>