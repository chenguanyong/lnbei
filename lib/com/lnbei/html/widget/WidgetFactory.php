<?php
namespace com\lnbei\html\widget;

use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\WidgetView;
final class WidgetFactory
{
    /**
     * 
     * @var unknown
     */
    private static $widgetFactory;
    /**
     * 
     * @var WidgetManage
     */
    private $widgetManage;
    /**
     * 标签管理器
     * @var TagManage
     */
    private $tagManage;
    /**
     * 标签样式管理器
     * @var TagCssManage
     */
    private $tagCssManage;
    /**
     * 标签属性管理器
     * @var TagAttrManage
     */
    private $tagAttrManage;
    /**
     * 构造函数
     */
    private function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage){
        //self::init($tagManage, $tagCssManage, $tagAttrManage);
        $this->tagAttrManage = $tagAttrManage;
        $this->tagManage = $tagManage;
        $this->tagCssManage = $tagCssManage;
        $this->widgetManage = new WidgetManage($tagManage, $tagCssManage, $tagAttrManage);
    }
    /**
     * 获取指定套件
     * @return \com\lnbei\html\widget\WidgetFactory|\com\lnbei\html\widget\unknown
     */
    public static function getWidgetFactory(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage){
        if(self::$widgetFactory == null){
            return new WidgetFactory( $tagManage, $tagCssManage, $tagAttrManage);
        }else{
            return self::$widgetFactory;
        }
    }
    public function getWidgetManage(){
        return $this->widgetManage;
    }
    public function getWidget($name){
        return $this->widgetManage->getSysWidget($name);
    }
    public function getWidgetList(){
        return $this->widgetManage->getWidgetsArray();
    }
    //通过HTML文件实例化widgetView类
    public function buildWidgetView($html){
        $widgetView = new WidgetView($this->tagManage, $this->tagCssManage, $this->tagAttrManage, $path='',false);
        $widgetView->initByHtml($html,$this->tagManage, $this->tagCssManage, $this->tagAttrManage);
        return $widgetView;
    }
    /**
     * 创建widget根据指定名称
     * @param string $name
     */
    public function createWidget($name){
        $widgetlist = $this->getWidgetList();
        if(empty($name)){
            return null;
        }
        $path=$widgetlist[$name]->path;
       
        
        $widget = new Widget($this->tagManage, $this->tagCssManage, $this->tagAttrManage, $path=$widgetlist[$name]->path,true);
        return $widget;
    }
}

?>