<?php
namespace com\lnbei\html\test;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\html\LayoutView;
use com\lnbei\file\DirErgodic;
class LayoutViewTest implements TestImp
{
    private $layoutView;
    public function __construct(){
        $tagManageTest = new TagManageTest();
        $tagManage = $tagManageTest->getObject();
        $tagCssManageTest = new TagCssManageTest();
        $tagCssManage = $tagCssManageTest->getObject();
        $tagAttrManageTest = new TagAttrManageTest();
        $tagAttrManage = $tagAttrManageTest->getObject();
        $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\template\\layout",'layout.widget.xml');
        $this->layoutView = new LayoutView($tagManage, $tagCssManage, $tagAttrManage, $r[1],true);
    }
    public function test(){
        $temp = $this->layoutView;
        var_dump($temp);
    }
    public static function run(){
        $temp = new LayoutViewTest();
        $temp->test();
    }
    public function getObject(){
        return $this->layoutView;
    }
}

?>