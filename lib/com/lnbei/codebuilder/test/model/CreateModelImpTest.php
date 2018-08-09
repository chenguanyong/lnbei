<?php
namespace com\lnbei\codebuilder\test\model;

use com\lnbei\html\test\TestImp;
use com\lnbei\codebuilder\model\CreateModelImp;
use com\lnbei\codebuilder\test\config\ConfigManageTest;
use com\lnbei\codebuilder\Config;
class CreateModelImpTest implements TestImp
{
    private $model;
    public function __construct(){
        
        Config::configView();
        $configManage = new ConfigManageTest();
        $config = $configManage->getObject();
        $array = $config->getAttr();
        $this->model = new CreateModelImp("ce_file",$array["model"]);
    }
    public function test(){
        $temp = $this->model;
     // $result =  $temp->createModel("dt_cljc");
        $result = $temp->createModelClass();
      var_dump($result);  
      echo 'success';
    }
    public static function run(){
        $code = new CreateModelImpTest();
        $code->test();
    }
    public function getObject(){
        return $this->model;
    }
}

?>