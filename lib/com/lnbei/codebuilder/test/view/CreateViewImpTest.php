<?php
namespace com\lnbei\codebuilder\test\view;

use com\lnbei\html\test\TestImp;
use com\lnbei\codebuilder\view\CreateViewImp;
use com\lnbei\codebuilder\test\config\ConfigManageTest;
use com\lnbei\codebuilder\test\model\CreateModelImpTest;
use com\lnbei\codebuilder\Config;
class CreateViewImpTest implements TestImp
{
    private $view;
    public function __construct(){
        Config::configView();
        $configManage = new ConfigManageTest();
        $config = $configManage->getObject();
        $array = $config->getAttr();
        $model = new CreateModelImpTest();
        $models = $model->getObject();
        $arrayTable = $models->createModel("ce_file");
        //var_dump($arrayTable);
     // exit;
        $this->view = new CreateViewImp($arrayTable,"ce_file",$array["view"]);
    }
    public function test(){
        $temp = $this->view;
        // $result =  $temp->createModel("dt_cljc");
        $result = $temp->createView();
        var_dump($result);
        echo 'success';
    }
    public static function run(){
        $code = new CreateViewImpTest();
        $code->test();
    }
    public function getObject(){
        return $this->view;
    }
}

?>