<?php
namespace com\lnbei\html\test\core\data\output;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\data\output\OutputAttribute;
use com\lnbei\html\test\PageFactoryTest;
use com\lnbei\html\core\tool\Tool;
class OutputAttributeTest implements TestImp
{
    private $outputAttribute;
    public function __construct(){
        $tagArray = array();
        $pageFactoryTest = new PageFactoryTest();
        $pageFactory = $pageFactoryTest->getObject();
        $page = $pageFactory->createPage();
        $array = $page->te();
        $g="";
        foreach ($array as $key=>$value){
            $g = $value[0];
            break;
        }
        $widgetFactory = $pageFactory->getWidgetFactory();
        $this->outputAttribute = new OutputAttribute($g,$widgetFactory);
    }
    public function test(){
        $temp = $this->outputAttribute;
       // $temp->toString();
        Tool::textArea($temp->toString());
        echo 'success';
    }
    public static function run(){
        $outputAttribute = new OutputAttributeTest();
        $outputAttribute->test();
    }
    public function getObject(){
        return $this->outputAttribute;
    }
}

?>