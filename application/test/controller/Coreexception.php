<?php
namespace app\test\controller;

use com\lnbei\html\test\core\exception\ConfigExceptionTest;
class Coreexception
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\core\\exception-->异常测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/Coreexception/configExceptionTest'>ConfigException 测试方法</a>";
        return $content;
    }
    //属性测试入口
    /**
     * TagAttrManage 测试方法
     */
    public function configExceptionTest(){
        ConfigExceptionTest::run();
    }
}

?>