<?php
namespace com\lnbei\html\test\widget;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\widget\WidgetFactory;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
class WidgetFactoryTest implements TestImp
{
    private $widgetFactory;
    public function __construct(){
        $tagManageTest = new TagManageTest();
        $tagManage = $tagManageTest->getObject();
        $tagCssManageTest = new TagCssManageTest();
        $tagCssManage = $tagCssManageTest->getObject();
        $tagAttrManageTest = new TagAttrManageTest();
        $tagAttrManage = $tagAttrManageTest->getObject();
        $this->widgetFactory = WidgetFactory::getWidgetFactory($tagManage, $tagCssManage, $tagAttrManage);
    }
    public function test(){
        $tempWF = $this->widgetFactory;
        $textWidget = $tempWF->getWidget('text');
        var_dump($textWidget);
    }
    public static function run(){
        $temp = new WidgetFactoryTest();
        $temp->test();
    }
    public function getObject(){
        return $this->widgetFactory;
    }
}

?>