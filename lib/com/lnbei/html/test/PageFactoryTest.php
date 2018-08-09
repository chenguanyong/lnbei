<?php
namespace com\lnbei\html\test;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\html\PageFactory;
use com\lnbei\html\core\tool\Tool;

class PageFactoryTest implements TestImp
{
    private $pageFactory;
    public function __construct(){
//         $tagManageTest = new TagManageTest();
//         $tagManage = $tagManageTest->getObject();
//         $tagCssManageTest = new TagCssManageTest();
//         $tagCssManage = $tagCssManageTest->getObject();
//         $tagAttrManageTest = new TagAttrManageTest();
//         $tagAttrManage = $tagAttrManageTest->getObject();
        $this->pageFactory = PageFactory::getPageFactory();
    }
    public function test(){
        $temp = $this->pageFactory;
        $page = $this->pageFactory->createPage();
        $t = serialize($page);
        var_dump($t);
        $page = unserialize($t);
        Tool::textArea($page->draw());
        echo 'success';
    }
    public static function run(){
        $pageFactory = new PageFactoryTest();
        $pageFactory->test();
    }
    public function getObject(){
        return $this->pageFactory;
    }
}

?>