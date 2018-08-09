<?php
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
use com\lnbei\html\tag\Tag;
class Em extends Tag
{ 
   protected  $tag = 'em';
 	//重画
    public function reDraw(){
        return self::draw();
    }
    public function __construct(TagAttribute $tagAttribute,TagCss $tagCss,$dataArray){
        parent::__construct( $tagAttribute, $tagCss, $dataArray);             
    }   
}

?>