<?php
namespace com\lnbei\html\core\data\css;

use com\lnbei\xml\XMLIteratorCallback;
use com\lnbei\html\core\data\ContentIteratorCallback;
class TagCssCallback implements XMLIteratorCallback,ContentIteratorCallback
{
    /**
     * 临时样式集合
     * @var 
     */
    private $tagCssArray;
    /**
     * 临时数组
     * @var array
     */
    private $tempArray;
    /**
     * 标签样式数组
     * @var array
     */
    private $tagCss;
    private $firstTagCssAttr;
    public $firstTagCssName;
    /**
     * 构造函数
     */
    public function __construct(){
       $this->tagCssArray = array();
       $this->tempArray = array();
       $this->tagCss = array();
    }
    /**
     * 回调函数
     * {@inheritDoc}
     * @see \com\lnbei\xml\XMLIteratorCallback::call()
     */
    public function call($xmlObj, $IDArray){
        $id = $IDArray['id'];
        $pid = $IDArray['pid'];
        $tempAttr = array();
        $tag = $xmlObj->getName();
        foreach ($xmlObj->attributes() as $key=>$v){
            $tempAttr[$key]=(String)$v;
        }
        $content = trim((String)$xmlObj);
        $this->tagCssArray[$pid][] = array('id'=>$id,'pid'=>$pid,'attr'=>$tempAttr,'content'=>$content,'tag'=>$tag);
    }
    /**
     * 回调函数
     * {@inheritDoc}
     * @see \com\lnbei\html\core\data\ContentIteratorCallback::callback()
     */
    public function callback($tagobj, $tags, $bool){
      
        switch($tagobj['tag']){
            case 'attr':{
                $this->temp=$tagobj['attr']['name'];
                $this->tagCss[$this->temp]=$tagobj;
                $this->tagCss[$this->temp]['childen'] = $this->tempArray;
                $this->tempArray = array();
            }break;
            case 'value':{
                $this->tempArray[] = $tagobj;
            }break;
        }
    }
    /**
     * 获取临时标签样式属性
     */
    public function getTagCssArray(){
        return $this->tagCssArray;
    }    
    /**
     * 获取标签样式数组
     */
    public function getTagCss(){
        return $this->tagCss;
    }
    /**
     * 设置根标签属性
     * {@inheritDoc}
     * @see \com\lnbei\xml\XMLIteratorCallback::setFristTag()
     */
    public function setFristTag($data){
        $this->firstTagCssAttr = $data['attr'];
        $this->firstTagCssName = $data['tag'];
    }
    /**
     * 获取跟标签属性
     */
    public function getFristTagCssAttr(){
        return $this->firstTagCssAttr;
    }
}

?>