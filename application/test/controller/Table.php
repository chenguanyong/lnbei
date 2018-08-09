<?php
namespace app\test\controller;

use com\lnbei\html\test\table\TableWidgetTest;
class Table 
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\table-->表格套件测试";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/table/tableWidgetTest'>TableWidget 测试方法</a>";
        return $content;
    }
    /**
     * TableWidget 测试方法
     */
    public function tableWidgetTest(){
        TableWidgetTest::run();
    }
}

?>