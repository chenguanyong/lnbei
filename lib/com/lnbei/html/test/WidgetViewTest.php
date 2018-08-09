<?php
namespace com\lnbei\html\test;

use com\lnbei\html\WidgetView;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\file\DirErgodic;
class WidgetViewTest implements TestImp
{
    private $widgetView;
    public function __construct(){
        $tagManageTest = new TagManageTest();
        $tagManage = $tagManageTest->getObject();
        $tagCssManageTest = new TagCssManageTest();
        $tagCssManage = $tagCssManageTest->getObject();
        $tagAttrManageTest = new TagAttrManageTest();
        $tagAttrManage = $tagAttrManageTest->getObject();
        $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\xml",'panl.widget.xml');
        $this->widgetView = new WidgetView($tagManage, $tagCssManage, $tagAttrManage, $r[1],true);
    }
    public function test(){
        $temp = $this->widgetView;
        $str = $temp->widgetToString();
        var_dump($str);
    }
    public static function run(){
        $temp = new WidgetViewTest();
        $temp->test();
    }
    public function getObject(){
        return $this->widgetView;
    }
}

?>