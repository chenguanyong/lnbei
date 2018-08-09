<?php
namespace com\lnbei\html\test\widget;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\html\widget\WidgetManage;
class WidgetManageTest implements TestImp
{
    private $widgetManage;
    public function __construct(){
        $tagManageTest = new TagManageTest();
        $tagManage = $tagManageTest->getObject();
        $tagCssManageTest = new TagCssManageTest();
        $tagCssManage = $tagCssManageTest->getObject();
        $tagAttrManageTest = new TagAttrManageTest();
        $tagAttrManage = $tagAttrManageTest->getObject();
        $this->widgetManage = new WidgetManage($tagManage, $tagCssManage, $tagAttrManage, true);
    }
    public function test(){
        $temp = $this->widgetManage;
        $gg = $temp->getWidgetsArray();
        var_dump($gg);
    }
    public static function run(){
        $tempWidgetManage = new WidgetManageTest();
        $tempWidgetManage->test();
    }
    public function getObject(){
        return $this->widgetManage;
    }
}

?>