<?php

namespace com\lnbei\codebuilder;
require "define.php";
use com\lnbei\codebuilder\controller\ControllerImp;
use com\lnbei\codebuilder\model\ModelImp;
use com\lnbei\codebuilder\view\ViewImp;
use com\lnbei\codebuilder\config\ConfigManage;
use com\lnbei\codebuilder\controller\CreateControllerImp;
use com\lnbei\codebuilder\model\CreateModelImp;
use com\lnbei\codebuilder\view\CreateViewImp;
class CodeBuilder
{
    /**
     * 
     * @var ControllerImp
     */
    private $controller;
    /**
     * 
     * @var ModelImp
     */
    private $model;
    /**
     * 
     * @var ViewImp
     */
    private $view;
    
    private $configManage;
    public function __construct(){
        Config::configView();
        $path = __DIR__ . "\\config\\xml\\config.xml";
        $this->configManage = new ConfigManage($path, true);//初始化配置文件
        self::init();
    }
    private function init(){
        $configData = $this->configManage ->getAttr();
        $this->controller = new CreateControllerImp($configData["controller"], "");
    }
    /**
     * 
     * @param string $sql
     */
    public function createByDB($table){
        $configData = $this->configManage->getAttr();
        $this->model = new CreateModelImp( $table, $configData["model"]);
        $arrayTable = $this->model->createModel($table);

        $this->model->createModelClass();
        $this->controller->createController($table);
        $this->view = new CreateViewImp($arrayTable,$table,$configData["view"]);
        $this->view->createView();
    }
    /**
     * 创建代码生成器对象
     */
    public static function createCodeBuilder(){
        
    } 
}

?>