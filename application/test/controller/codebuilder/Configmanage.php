<?php
namespace app\test\controller\codebuilder;

use think\Controller;
use com\lnbei\codebuilder\test\config\ConfigManageTest;
class Configmanage extends Controller
{
    public function index(){
    
        $content = "欢迎进入com\\lnbei\\codeBuilder-->代码生成器测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> 配置文件测试方法<hr>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Configmanage/configmanage'>configmanage 测试方法</a>";
        return $content;
    }
    public function configmanage(){
        ConfigManageTest::run();
    }
}

?>