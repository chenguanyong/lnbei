<?php
namespace com\lnbei\html\test;

use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\HeadView;
class HeadViewTest implements TestImp
{
    private $head;
    public function __construct(){
        $tagManageTest = new TagManageTest();
        $tagManage = $tagManageTest->getObject();
        $tagCssManageTest = new TagCssManageTest();
        $tagCssManage = $tagCssManageTest->getObject();
        $tagAttrManageTest = new TagAttrManageTest();
        $tagAttrManage = $tagAttrManageTest->getObject();
        $this->head = new HeadView($tagManage, $tagCssManage, $tagAttrManage);
    }
    public function test(){
        $temp = $this->head;
        //$widgetArray = $temp->getWidgetArray();
        
        //var_dump($widgetArray);
        $str = $temp->toString();
        echo "<textarea>".$str."</textarea>";
        echo 'success';
    }
    public static function run(){
        $m = new HeadViewTest();
        $m->test();
    }
    public function getObject(){
        return $this->head;
    }
}

?>