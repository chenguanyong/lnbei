<?php
use com\lnbei\html\tag\Tag;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
class Article extends Tag 
{
    /*
     * <article>
  <h1>Internet Explorer 9</h1>
  <p>Windows Internet Explorer 9（简称 IE9）于 2011 年 3 月 14 日发布.....</p>
</article>
     */
    protected  $tag = 'article';
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