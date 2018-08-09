<?php
namespace app\test\controller;

use com\lnbei\html\test\widget\WidgetFactoryTest;
use com\lnbei\html\test\widget\WidgetManageTest;
use com\lnbei\html\test\widget\WidgetTest;
class Widget
{ 
    public function index(){
        $content = "欢迎进入com\lnbei\html\widget-->控件测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/widget/widgetFactoryTest'>WidgetFactory 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/widget/widgetManageTest'>WidgetManage 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/widget/widgetTest'>WidgetTest 测试方法</a>";
        return $content;
    }
    /**
     * TagAttrManage 测试方法
     */
    public function widgetFactoryTest(){
        WidgetFactoryTest::run();
    }
    public function widgetManageTest(){
        WidgetManageTest::run();
    }
    public function widgetTest(){
        WidgetTest::run();
    }
}

?>