<?php
use com\lnbei\html\tag\Tag;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
class Button extends Tag
{ 
    protected  $tag = 'button';
	//重画
    public function reDraw(){
        return parent::draw();
    }
    public function __construct(TagAttribute $tagAttribute,TagCss $tagCss,$dataArray){
        parent::__construct( $tagAttribute, $tagCss, $dataArray);             
    }	
    
}

?>