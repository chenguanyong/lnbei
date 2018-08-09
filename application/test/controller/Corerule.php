<?php
namespace app\test\controller;

use com\lnbei\html\test\core\rule\RuleTest;
use com\lnbei\html\test\core\rule\RuleActionTest;
use com\lnbei\html\test\core\rule\RuleActionManageTest;
use com\lnbei\html\test\core\rule\subrule\BasicRuleTest;
class Corerule 
{
    public function index(){
        $content = "欢迎进入com\\lnbei\\html\\test\\core\\rule-->标签规则测试程序";
        $content .= "<a target='_blank' href='http://www.lnbei.xin'>更多</a>";
        $content .= "<br /> <a target='_blank' href='/test/Corerule/ruleTest'>RuleTest 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Corerule/ruleActionTest'>RuleAction 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Corerule/ruleActionManageTest'>RuleActionManage 测试方法</a>";
        $content .= "<br /> <a target='_blank' href='/test/Corerule/basicRuleTest'>BasicRuleTest 测试方法</a>";
        return $content;
    }
    public function ruleTest(){
        RuleTest::run();
    }
    public function ruleActionTest(){
        RuleActionTest::run();
    }
    public function ruleActionManageTest(){
        RuleActionManageTest::run();
    }
    public function basicRuleTest(){
        BasicRuleTest::run();
    }
}

?>