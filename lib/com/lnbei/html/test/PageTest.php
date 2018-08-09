<?php
namespace com\lnbei\html\test;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\Page;
class PageTest implements TestImp
{
    private $page;
    public function __construct(){
        $tagManageTest = new TagManageTest();
        $tagManage = $tagManageTest->getObject();
        $tagCssManageTest = new TagCssManageTest();
        $tagCssManage = $tagCssManageTest->getObject();
        $tagAttrManageTest = new TagAttrManageTest();
        $tagAttrManage = $tagAttrManageTest->getObject();
        $pageFactoryObj = new PageFactoryTest();
        $pageFactory = $pageFactoryObj->getObject();
        $this->page = new Page($pageFactory);
    }
    public function test(){
        $temp = $this->page;
        echo 'success';
    }
    public static function run(){
        $page = new PageTest();
        $page->test();
    }
    public function getObject(){
        return $this->page;
    }
}

?>