<?php
use com\lnbei\html\tag\Tag;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
class Aside extends Tag 
{
/*
 * <aside>
<h4>Epcot Center</h4>
The Epcot Center is a theme park in Disney World, Florida.
</aside>
 */
    protected  $tag = 'aside';
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