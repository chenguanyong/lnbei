<?php
/**
 * 自定义标签
 */

use com\lnbei\html\tag\Tag;
class Lbtag extends Tag
{
    protected $tag = 'lbtag';
    protected $tagType = 4;
    public function __construct(TagAttribute $tagAttribute,TagCss $tagCss,$dataArray){
        parent::__construct($tagAttribute, $tagCss, $dataArray);
    }
    
    //重画
    public function reDraw(){
        $html = parent::draw();
        return $html;
    } 
}

?>