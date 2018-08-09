<?php
namespace com\lnbei\html\core\view\widget;
/**
 * 套件管理
 */
use com\lnbei\html\widget\Widget;
use com\lnbei\html\core\view\ViewManage;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\core\config\Config;
class WidgetViewManage extends ViewManage 
{
    public function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage,$floag = true){
        $dir = Config::$confArray['TEMPLATEPATH']."/output/";
        parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $dir, $floag);
    }
    public function addWidgetView($widgetView){
        parent::addWidget($widgetView);
    }
    public function deleWidgetView($widgetView){
        parent::deleWidget($widgetView);
    }
    public function getWidgetView($name){
        return parent::getWidget($name);
    }
    public function getWidgetViewArray(){
        return parent::getWidgetsArray();
    }
}

?>