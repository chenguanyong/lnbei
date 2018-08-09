<?php
namespace com\lnbei\html\core\rule;

use com\lnbei\html\tag\Tag;
use app\test\controller\Widget;
interface RuleAction
{
    public function doAction(Tag $tag,Widget $widget);
}

?>