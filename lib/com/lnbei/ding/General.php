<?php
namespace com\lnbei\ding;
require_once 'autoloder.php';

class General
{
    
    private $corpid;//
    private $corpsecret;//
    private $ding;//
    public function __construct($corpid, $corpsecret){
        $this->corpid = $corpid;
        $this->corpsecret=$corpsecret; 
        $this->ding = new \DingTalkClient;
        $this->ding->format = "json";
    }
    /**
     * 获取企业内部的AccessToken
     */
    public function getAccessToken(){
        $req = new \OapiGettokenRequest;
        $req->setCorpid($this->corpid);
        $req->setCorpsecret($this->corpsecret);
        $resp = $this->ding->execute($req);
        return json_decode($resp);
    }    
}

?>