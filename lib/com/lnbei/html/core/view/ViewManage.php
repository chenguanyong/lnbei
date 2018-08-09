<?php
namespace com\lnbei\html\core\view;
/**
 * 系统套件管理类
 */
use com\lnbei\html\widget\Widget;
use com\lnbei\html\core\view\Manage;
use com\lnbei\html\WidgetView;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\core\config\Config;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\core\tool\Tool;
abstract class ViewManage implements Manage
{
    /**
     * 系统套件列表
     * @var array
     */
    private $widgetsArray;
    /**
     * 系统套件名称列表
     * @var string
     */
    protected $widgetKeysStr;
    
    public function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage,$dir='',$floag = true){
        $this->widgetsArray = array();
        if($floag){
            self::init( $tagManage, $tagCssManage, $tagAttrManage, $dir);
        }
    }
    private function init(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage,$dir = ''){
        $files = self::extractFile($dir);//Config::$confArray['TEMPLATEPATH']."/output/");
        foreach ($files as $k=>$v){
            $tempWidget = new WidgetView($tagManage, $tagCssManage, $tagAttrManage, $v,true);
            Tool::textArea($tempWidget->widgetToString());
            $this->widgetsArray[$tempWidget->getName()] = $tempWidget;
        }
        $tempWidgetKeysArray = array_keys($this->widgetsArray);
        $this->widgetKeysStr = implode("_", $tempWidgetKeysArray);
        $this->widgetKeysStr = "_" . $this->widgetKeysStr . "_";
    }
    /**
     * 查询指定文件夹下的文件
     * @param string|array $dir
     */
    private function extractFile($dir){
       $files = array();
       if(is_array($dir)){
           foreach ($dir as $value){
            $file = DirErgodic::getDirArray($value);
            $files = array_merge($files,$file);
           }
       }
       else if(is_dir($dir)){
           $files = DirErgodic::getDirArray($value);
       }
       return $files;
    }
    protected function addWidget($widget){
        $name = $widget->getName();
        $this->widgetsArray[$name]=$widget;
    }
    protected function deleWidget($widget){
        $name = $widget->getName();
        unset($this->widgetsArray[$name]);
    }
    protected function getWidget($name){
        return $this->widgetsArray[$name];
    }
    public function getWidgetsArray(){
        return $this->widgetsArray;
    }
    
}

?>