<?php
use com\lnbei\html\tag\Tag;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
class Body extends Tag
{
    protected  $tag = 'body';
    public  $href = null;
    public function __construct(TagAttribute $tagAttribute,TagCss $tagCss,$dataArray){
        parent::__construct($tagAttribute, $tagCss, $dataArray);
    }
    protected function emptAttr($html){
        if(!empty($this->href)){
            $html = $html . 'href="' . $this->href . '" ';
        }
        return $html;
    }
    //重画
    public function reDraw(){
        $html = parent::draw();
        return $html;
    } 
}

?>