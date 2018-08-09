<?php
namespace app\test\controller;

use com\lnbei\html\test\widgettool\TableViewTest;
use com\lnbei\html\test\widgettool\WidgetListTest;
class Widgettool
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\widgetTool-->表格套件测试";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/Widgettool/tableViewTest'>TableWidget 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Widgettool/widgetListTest'>WidgetListTest 测试方法</a>";
        return $content;
    }
    /**
     * TableWidget 测试方法
     */
    public function tableViewTest(){
        TableViewTest::run();
    }
    /**
     * WidgetList 测试方法
     */
    public function widgetListTest(){
        
        WidgetListTest::run();
    }
}

?>