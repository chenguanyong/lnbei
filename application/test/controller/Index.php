<?php
namespace app\test\controller;

use com\lnbei\html\test\WidgetViewTest;
use com\lnbei\html\test\HeadViewTest;
use com\lnbei\html\test\LayoutViewTest;
use com\lnbei\html\test\PageFactoryTest;
use com\lnbei\html\test\PageTest;
class Index
{
    public function Index(){
        
        $content = "欢迎进入lnbei测试环境<br />";
        $content .= "<br /> lnbei HTML在线编辑器测试程序 <hr>";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/coredataattribute'>标签属性(attribute) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/coredatacss'>标签样式(css) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/coredatacontent'>控件内容(WidgetContent) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/tag'>标签(Tag) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/widget'>控件(widget) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Coreexception'>异常(exception) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Table'>表格套件(TableWidget) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Widgettool'>(Widgettool) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Corerule'>规则(Rule) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Log'>日志(Log) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Coredataoutputattribute'>标签输出(OutputAttribute) 测试方法</a>";
        $content .= "<br /> <hr>";
        $content .= "<br /> <a target='_blank' href='/test/index/widgetViewTest'>控件(WidgetView) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/index/headViewTest'>头部(head) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/index/layoutViewTest'>布局类(LayoutView) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/index/pageFactoryTest'>页面工厂(PageFactory) 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/index/pageTest'>页面(Page) 测试方法</a>";
        $content .= "<br /> <hr>";
        $content .= "<br /> 代码生成器测试程序 <hr>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Code_Builder/index'>代码生成器</a>";
        return $content;
    }
    public function widgetViewTest(){
        WidgetViewTest::run();
    }
    public function headViewTest(){
        HeadViewTest::run();
    }
    public function layoutViewTest(){
        LayoutViewTest::run();
    }
    public function pageFactoryTest(){
        PageFactoryTest::run();
    }
    public function pageTest(){
        PageTest::run();
    }
}

?>