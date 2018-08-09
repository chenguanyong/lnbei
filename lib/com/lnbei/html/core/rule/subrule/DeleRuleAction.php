<?php
use com\lnbei\html\core\rule\RuleAction;
use com\lnbei\html\tag\Tag;
use app\test\controller\Widget;
class DeleRuleAction implements RuleAction
{
    public function __construct(){
        parent::__construct();
    }
    /**
     * 动作执行函数
     * {@inheritDoc}
     * @see \com\lnbei\html\core\rule\RuleAction::doAction()
     */
    public function doAction(Tag $tag,Widget $widget){
        
    }
}

?>