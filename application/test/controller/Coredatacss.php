<?php
namespace app\test\controller;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\css\TagCssTest;
class CoreDataCss
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\core\\data\\css-->标签属性测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/CoreDataCss/tagCssManageTest'>TagCssManage 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/CoreDataCss/tagCssTest'>TagCss 测试方法</a>";
        return $content;
    }
    //属性测试入口
    /**
     * TagAttrManage 测试方法
     */
    public function tagCssManageTest(){
        TagCssManageTest::run();
    }
    /**
     * tagAttribute 测试方法
     */
    public function tagCssTest(){
        TagCssTest::run();
    }
}

?>