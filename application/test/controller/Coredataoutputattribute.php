<?php
namespace app\test\controller;

use com\lnbei\html\test\core\data\output\OutputAttributeTest;
use think\Controller;
class Coredataoutputattribute extends Controller
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\core\\data\\OutputAttribute-->标签输出测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/Coredataoutputattribute/outputAttributeTest'>OutputAttribute 测试方法</a>";
        return $content;
    }
    //属性测试入口
    /**
     * WidgetContent 测试方法
     */
    public function outputAttributeTest(){
        OutputAttributeTest::run();
    }
    public function output(){
        return $this->fetch('./output');
    }
}

?>