<?php
namespace com\lnbei\codebuilder\test\config;

use com\lnbei\html\test\TestImp;
use com\lnbei\codebuilder\config\ConfigManage;
use com\lnbei\codebuilder\Config;
class ConfigManageTest implements TestImp
{
    private $config;
    public function __construct(){
        
        $path = Config::$dataArray["RootPath"] . "\\config\\xml\\config.xml";
        //$path = "G:\\linbei\\root\\phpace_dev\\lib\\com\\lnbei\\codebuilder\\config\\xml\\config.xml";
        $this->config = new ConfigManage($path,true);
    }
    public function test(){
        var_dump($this->config->getAttr()["view"]);
        echo 'success';
    }
    public static function run(){
        $code = new ConfigManageTest();
        $code->test();
    }
    public function getObject(){
        return $this->config;
    }
}

?>