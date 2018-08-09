<?php
namespace com\lnbei\html\test\core\rule;

use com\lnbei\html\test\TestImp;
class RuleActionTest implements TestImp
{
    private $ruleAction;
    
    public function __construct(){
        $this->ruleAction = new rule;
    }
    public function test(){
        $temp = $this->tagCss;
        $temp->initCSS(array("ll"=>"sdf","sdf"=>"sfads"));
        $str = $temp->toString();
        var_dump($str);
        //var_dump($array);
    }
     
    public static function run(){
        $attr = new TagCssTest();
        $attr -> test();
    }
    public function getObject(){
        return $this->tagCss;
    }
}

?>