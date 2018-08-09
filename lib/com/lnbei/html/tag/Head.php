<?php
use com\lnbei\html\tag\Tag;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
class Head extends Tag
{
    protected  $tag = 'head';
    public function __construct(TagAttribute $tagAttribute,TagCss $tagCss,$dataArray){
        parent::__construct( $tagAttribute, $tagCss, $dataArray);
    }
    //重画
    public function reDraw(){
        $html = parent::draw();
        return $html;
    }
}

?>