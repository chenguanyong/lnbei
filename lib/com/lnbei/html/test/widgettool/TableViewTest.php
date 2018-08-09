<?php
namespace com\lnbei\html\test\widgettool;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\html\widget\Widget;
use com\lnbei\file\DirErgodic;
class TableViewTest implements TestImp
{
    private $tableView;
    public function __construct(){
        $tagManageTest = new TagManageTest();
        $tagManage = $tagManageTest->getObject();
        $tagCssManageTest = new TagCssManageTest();
        $tagCssManage = $tagCssManageTest->getObject();
        $tagAttrManageTest = new TagAttrManageTest();
        $tagAttrManage = $tagAttrManageTest->getObject();
        $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\xml",'panl.widget.xml');
        $this->tableView = new Widget($tagManage, $tagCssManage, $tagAttrManage, $r[1],true);
    }
    public function test(){
    
    }
    public static function run(){
        $widget = new TableViewTest();
        $widget->test();
    }
    public function getObject(){
        return $this->tableView;
    }
}

?>