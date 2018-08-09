<?php
use com\lnbei\html\tag\Tag;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
class Img extends Tag
{ 
    protected  $tag = 'img';
    public  $src = null;
    public function __construct(TagAttribute $tagAttribute,TagCss $tagCss,$dataArray){
        parent::__construct( $tagAttribute, $tagCss, $dataArray);
        $this->src = '#';
    }
    protected function emptAttr($html){
        if(!empty($this->src)){
            $html = $html . 'src="' . $this->href . '" ';
        }
		return $html;
    }
    //重画
    public function reDraw(){
        $html = parent::start();
        $html = parent::attr($html);
        $html = self::emptAttr($html);
        $html = parent::onEvent($html);
        $html = parent::emptOnEvent($html);
        $html = parent::content($html);
        $html = parent::end($html);
        return $html;
    }    
}

?>