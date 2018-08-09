<?php
namespace app\test\controller\codebuilder;

use think\Controller;
use com\lnbei\codebuilder\test\view\CreateViewImpTest;
class ViewCreateViewImp extends Controller
{
    public function index(){
        

        $content = "欢迎进入com\\lnbei\\codebuilder\\model-->模型生成测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/codebuilder.View_Create_View_Imp/createViewImp'>CreateViewImp 测试方法</a>";
        $content .= "<br /> <hr>";
        return $content;
    }
    public function createViewImp(){
        
       CreateViewImpTest::run(); 
        
    }
    
}

?>