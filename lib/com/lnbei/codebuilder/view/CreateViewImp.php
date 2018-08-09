<?php
namespace com\lnbei\codebuilder\view;


use com\lnbei\codebuilder\js\JSImp;
use com\lnbei\codebuilder\Builder;
use com\lnbei\file\File;
use com\lnbei\codebuilder\Config;
use com\lnbei\codebuilder\js\CreateJSImp;
class CreateViewImp extends Builder implements ViewImp
{
    private $table;
    private $data;
    /**
     * 
     * @var BaseView
     */
    private $view;
    /**
     * 
     * @var JSImp
     */
    private $js;
    private $configData;
    private $typeFun;
    private $typePath;
    private $mainViewPath;


    /**
     * 
     * @param array $data 表字段数据
     * @param string $table 表名
     * @param array $configData 配置数据
     */
    public function __construct($data,$table,$configData){
        parent::__construct();
        var_dump($data);
        $this->startPhpFlag = "";
        $this->endPhpFlag = "";
        $this->data = $data;
        $this->table = $table;
        $this->configData = $configData;
        self::initConfig();
        $path =ROOTPATH . self::getConfigAttr("layoutXmlPath") . "\\" . "layout.widget.xml";
        //$path = Config::$dataArray["View"]["LayoutPath"];
        $this->view = new BaseView($data[$table], $this->configData, $path);
        $this->mvcFolder = "view";
        $this->js = new CreateJSImp($data, $table, $this->typeFun);
        var_dump($this->typePath);
    }
    /**
     * 
     * {@inheritDoc}
     * @see \com\lnbei\codebuilder\view\ViewImp::createView()
     */
    public function createView(){
        $this->mainViewPath = Config::$dataArray["View"]["MainViewPath"];
        $tempHtml= self::buildMainView();
        $tempHtml .= "<script>" . self::buildMainJs() . "</script>";
        $strPath = self::spellPathView($this->table, $methods = "index");
        return parent::saveFile($strPath, $tempHtml);
    }
    private function buildMainView(){
        $mainView = File::fReadContex($this->mainViewPath);
        $partView = self::buiderModelView();
        return $mainView . $partView;
    }
    private function buildMainJs(){
        $htmlJs = $this->js->createJS();
        return $htmlJs ;
    }
    private function initConfig(){
        $attrs = $this->configData["chilenTag"];
        foreach ($attrs as $key=>$value){
            if(!empty($value["attr"]["type"])){ 
                $type = $value["attr"]["type"];
                 switch($type){
                     case "path":{$this->typePath[] = $value["attr"];}break;
                     case "fun":{$this->typeFun[$value["attr"]["name"]] = $value["attr"];}break;
                 }           
            }
        }
    }
    /**
        建立crud模态框视图
     */
    private function buiderModelView(){
        if(empty($this->typeFun)){
            return "";
        }
        $str = "";
        foreach ($this->typeFun as $key=>$value){
            switch($value["name"]){
                case ViewType::ADDVIEW : $str .= $this->view->createView(ViewType::ADDVIEW, $value);break;
                case ViewType::EDITVIEW: $str .= $this->view->createView(ViewType::EDITVIEW, $value);break;
                case ViewType::LOOKVIEW: $str .= $this->view->createView(ViewType::LOOKVIEW, $value);break;
                case ViewType::DELEVIEW: $str .= $this->view->createView(ViewType::DELEVIEW, $value);break;
            }
        }
        return $str;
    }
    public function getConfigAttr($name){
        
        foreach ($this->typePath as $key=>$value){
            if($value["name"] == $name){
                
                return $value["value"];
            }
        }
        foreach ($this->typeFun as $key=>$value){
            if($value["name"] == $name){
            
                return $value["value"];
            }
        }
    }
    
}

?>