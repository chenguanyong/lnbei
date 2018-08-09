<?php
namespace com\lnbei\ding\role;

class Role
{
    /**
     * 通行证
     * @var string
     */
    private $AccessToken;
    private $ding;
    public function __construct($AccessToken){
        $this->AccessToken = $AccessToken;
        $this->ding = new \DingTalkClient;
        $this->ding->format = "json";
    }
    public function GetList(){
        $req = new \OapiRoleListRequest();
        $req->setSize($size);
        $req->setOffset($offset);
        $json = $this->ding->execute($req, $this->AccessToken, "https://oapi.dingtalk.com/topapi/role/list");
        return json_decode($json);
    }
    
}

?>