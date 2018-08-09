<?php
namespace com\lnbei\codebuilder\test\js;

use com\lnbei\html\test\TestImp;
use com\lnbei\codebuilder\js\CreateJSImp;
class CreateJsImpTest implements TestImp
{
    private $js;
    public function __construct(){
        $configManage = new ConfigManageTest();
        $config = $configManage->getObject();
        $array = $config->getAttr();
        $this->model = new CreateJSImp("dt_cljc",$array["model"]);
    }
    public function test(){
        $temp = $this->js;

        echo 'success';
    }
    public static function run(){
        $code = new CreateJsImpTest();
        $code->test();
    }
    public function getObject(){
        return $this->js;
    }
}

?>