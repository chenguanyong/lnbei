<?php
namespace app\test\controller;

use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\test\core\data\attribute\TagAttributeTest;
class CoreDataAttribute
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\core\\data\\attribute-->标签属性测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/CoreDataAttribute/tagAttrManageTest'>TagAttrManage 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/CoreDataAttribute/tagAttributeTest'>TagAttribute 测试方法</a>";
        return $content;
    }
    //属性测试入口
    /**
     * TagAttrManage 测试方法
     */
    public function tagAttrManageTest(){
        TagAttrManageTest::run();
    }
    /**
     * tagAttribute 测试方法
     */
    public function tagAttributeTest(){
        TagAttributeTest::run();
    }
}

?>