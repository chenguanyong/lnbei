<?php
namespace app\test\controller;

use com\lnbei\html\test\tag\TagTest;
use com\lnbei\html\test\tag\TagManageTest;
class Tag 
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\tag-->标签属性测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/Tag/tagTest'>Tag 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='tagManageTest'>TagManage 测试方法</a>";
        return $content;
    }
    //属性测试入口
    /**
     * TagAttrManage 测试方法
     */
    public function tagTest(){
        TagTest::run();
    }
    public function tagManageTest(){
        TagManageTest::run();
    }
}

?>