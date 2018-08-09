<?php
namespace com\lnbei\html;

use com\lnbei\html\tag\Tag;
use com\lnbei\html\widget\Widget;
use com\lnbei\file\DirErgodic;
class HeadView extends Widget
{
    private $headWidgetArray;
    public function __construct($tagManage,$tagCssManage,$tagAttrManage,$path='',$flog=true){
        $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\template\\head",'head.widget.xml');
        parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $r[1],$flog=true);
    }
    public function toString(){
        $content = parent::widgetToString();
        return $content;
    }
    //添加标签
    public function addTag(Tag $tag){
        $id = $tag->getSid();
        $this->tagArray[$id] = $tag; 
    }
    //删除标签
    public function deleTag($id){
        unset($this->tagArray[$id]);
    }
    //获取标签
    public function getTag($id){
        return $this->tagArray[$id];
    }
}

?>