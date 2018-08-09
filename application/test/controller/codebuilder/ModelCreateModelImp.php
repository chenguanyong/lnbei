<?php
namespace app\test\controller\codebuilder;

use think\Controller;
use com\lnbei\codebuilder\test\model\CreateModelImpTest;
class ModelCreateModelImp extends Controller
{
    public function index(){
    
        $content = "欢迎进入com\\lnbei\\codebuilder\\model-->模型生成测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.Model_Create_Model_Imp/createModelImpTest'>CreateModelImp 测试方法</a>";
        $content .= "<br /> <hr>";
        return $content;
    }
    //测试代码生成器主类
    public function createModelImpTest(){
        CreateModelImpTest::run();
    }
}

?>