<?php
namespace com\lnbei\html\test\core\rule;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\rule\RuleActionManage;
class RuleActionManageTest implements TestImp
{
    private $ruleActionManage;
    
    public function __construct(){
        $this->ruleActionManage = new RuleActionManage();
    }
    public function test(){
        $temp = $this->ruleActionManage;
        $temp->registerRuleAction("DeleRuleAction");
        var_dump($temp);
    }
     
    public static function run(){
        $attr = new RuleActionManageTest();
        $attr -> test();
    }
    public function getObject(){
        return $this->ruleActionManage;
    }
}

?>