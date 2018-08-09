<?php
namespace com\lnbei\html\test\core\rule;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\rule\Rule;
use com\lnbei\html\test\widget\WidgetTest;
class RuleTest implements TestImp
{
    private $rule;
    
    public function __construct(){
        $widgetTest = new WidgetTest();
        $widget = $widgetTest->getObject();
        $ruleArray = $widget->getRule();
       // var_dump($ruleArray);
        //exit;
        $this->rule = new Rule($ruleArray);
    }
    public function test(){
        $temp = $this->rule;
        $g = $temp->getRuleArrays();
        var_dump($g);
    }
     
    public static function run(){
        $attr = new RuleTest();
        $attr -> test();
    }
    public function getObject(){
        return $this->rule;
    }
}

?>