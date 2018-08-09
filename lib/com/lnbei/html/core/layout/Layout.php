<?php
namespace com\lnbei\html\core\layout;

use com\lnbei\html\widget\Widget;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
class Layout extends Widget
{   
	public function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage,$path,$bool=false){
		parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $path, $bool);
	}
}

?>