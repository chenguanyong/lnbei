<?php
namespace com\lnbei\codebuilder\test\controller;

use com\lnbei\html\test\TestImp;
use com\lnbei\codebuilder\controller\CreateControllerImp;
use com\lnbei\codebuilder\config\ConfigManage;
use com\lnbei\codebuilder\test\config\ConfigManageTest;
use com\lnbei\codebuilder\Config;
class CreateControllerImpTest implements TestImp
{
    private $createControllerImp;
    public function __construct(){
        
        Config::configView();
        $configManage = new ConfigManageTest();
        $a = $configManage->getObject()->getAttr();
        $this->createControllerImp = new CreateControllerImp($a["controller"],"sdfa");
    }
    public function test(){
       $html = $this->createControllerImp->createController("File");
        
       var_dump($html);
       echo 'success';
    }
    public static function run(){
        $createControllerImp = new CreateControllerImpTest();
        $createControllerImp->test();
    }
    public function getObject(){
        return $this->createControllerImp;
    }
}

?>