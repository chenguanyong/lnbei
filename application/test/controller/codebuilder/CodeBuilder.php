<?php
namespace app\test\controller\codebuilder;

use think\Controller;
use com\lnbei\codebuilder\test\CodeBuilderTest;
use com\lnbei\codebuilder\test\controller\CreateControllerImpTest;
use com\lnbei\codebuilder\test\model\CreateModelImpTest;
class CodeBuilder extends Controller
{
    
    public function index(){
        
        $content = "欢迎进入com\\lnbei\\codeBuilder-->代码生成器测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Model_Create_Model_Imp'>模型 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Configmanage'>配置文件 测试方法</a>";
        $content .= "<br /> <hr>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Code_Builder/codeBuilderTest'>CodeBuilder 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Code_Builder/createControllerImp'>CreateControllerImp 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Code_Builder/createModelImpTest'>CreateModelImpTest 测试方法</a>";
        $content .= "<br /> <hr>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.View_Create_View_Imp/'>ViewCreateViewImp 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Js_Create_Js_Imp'>JsCreateJsImp 测试方法</a>";
        return $content;
    }
    //测试代码生成器主类
    public function codeBuilderTest(){
       CodeBuilderTest::run();  
    }
    public function createControllerImp(){
        CreateControllerImpTest::run();
    }
    public function createModelImpTest(){
        CreateModelImpTest::run();
    }
}

?>