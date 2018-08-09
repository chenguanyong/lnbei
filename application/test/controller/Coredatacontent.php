<?php
namespace app\test\controller;

use com\lnbei\html\test\core\content\WidgetContentTest;
class Coredatacontent 
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\core\\data\\content-->标签内容测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/Coredatacontent/widgetContentTest'>WidgetContent 测试方法</a>";
        return $content;
    }
    //属性测试入口
    /**
     * WidgetContent 测试方法
     */
    public function widgetContentTest(){
        WidgetContentTest::run();
    }

}

?>