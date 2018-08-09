<?php

namespace com\lnbei\html;
define('DEFINE',"define.php");

use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\core\config\Config;
use com\lnbei\html\Page;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\widget\WidgetFactory;
use com\lnbei\html\layout\LayoutViewFactory;

final class PageFactory
{
    /**
     * 
     * @var PageFactory
     */
    private static $pageFactory;
    /**
     * 
     * @var TagManage
     */
    private static $tagManage ;
    /**
     * 
     * @var TagCssManage
     */
    private $tagCssManage;
    /**
     * 
     * @var TagAttrManage $tagAttrManage
     */
    private $tagAttrManage;
    /**
     * 套件工厂
     * @var WidgetFactory
     */
    private $widgetFactory;
    /**
     * 
     * @var LayoutViewFactory
     */
    private $layoutFactory;
    /**
     * 配置文件
     * @var array
     */
    private static $CONFARRAY ;
    /**
     * 构造函数
     */
    private function __construct(){
        //self::$pageView = new PageView();
       self::init();
    }
    /**
     * 
     */
    protected function init(){
        $this->tagCssManage = new TagCssManage(static::$CONFARRAY["TAGCSSPATH"],true);
        $this->tagAttrManage = new TagAttrManage(static::$CONFARRAY["TAGATTRPATH"],true);
        $this->widgetFactory = WidgetFactory::getWidgetFactory(PageFactory::$tagManage,$this->tagCssManage,$this->tagAttrManage);
        $this->layoutFactory = LayoutViewFactory::getLayoutViewFactory(PageFactory::$tagManage,$this->tagCssManage,$this->tagAttrManage);
    }
    /**
     * 
     * @return \com\lnbei\html\unknown|\com\lnbei\html\PageFactory
     */
    public static function getPageFactory($configData = array()){

       
     
        if(self::$pageFactory != null){
           
            return self::$pageFactory;
        }else{
            require_once DEFINE;//系统常量文件
            if(!empty($configData)){
                PageFactory::integrationConfig($configData);
            }
            PageFactory::$CONFARRAY = Config::$confArray;
            PageFactory::$tagManage = new TagManage(static::$CONFARRAY["TAGPATH"],true);
            $pageFactory = new PageFactory();
            return $pageFactory;
        }
    }
    public static function integrationConfig($configData){
       require_once DEFINE;
       $file = DirErgodic::ergodics(LNBEIPATH,LNBEICONFIG);
       if(!empty($file[0])){
           $tempConfig = require_once LNBEICONFIG;
           Config::mergeConfigData($tempConfig);
       } 
       Config::mergeConfigData($configData);
    }
    /**
     * 
     */
    public function createPage(){
        return new Page($this);
    }
    /**
     * 
     * @return \com\lnbei\html\unknown
     */
    public static function getTagManage(){
        return self::$tagManage;
    }
    /**
     * 
     * @return \com\lnbei\html\unknown
     */
    public function getTagCssManage(){
        return $this->tagCssManage;
    }
    /**
     * 
     */
    public function getTagAttrManage(){
        return $this->tagAttrManage;
    }
    /**
     * 根据XML文件名返回文件目录
     * @param string $name
     * @return boolean|number[]|unknown[]|string[]
     */
    public static function getXmlPathByName($name){
        return DirErgodic::ergodics(static::$CONFARRAY['ROOTPATH'], $name);
    }
    /**
     * 获取套件工厂类
     */
    public function getWidgetFactory(){
        return $this->widgetFactory;
    }
    /**
     * 创建布局套件对象
     * @param string $layoutTemplatePath
     */
    public function createLayoutWidget($layoutTemplatePath){
        $layoutWidget = null;
        try{
            $layoutWidget = new LayoutView(PageFactory::$tagManage, $this->tagCssManage, $this->tagAttrManage, $layoutTemplatePath, true);
        }catch (\Exception $e){
           exit("" . $e->getMessage()); 
        }
        return $layoutWidget;
    }

}

?>