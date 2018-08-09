<?php
namespace app\test\controller;

use com\lnbei\html\test\core\log\LogTest;
use com\lnbei\html\test\core\log\SimpleLogTest;
class Log
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\tag-->日志测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/Log/simpleLogTest'>simpleLogTest 测试方法</a>";
        return $content;
    }
    //属性测试入口
    /**
     * TagAttrManage 测试方法
     */
    public function simpleLogTest(){
        SimpleLogTest::run();
    }

}

?>