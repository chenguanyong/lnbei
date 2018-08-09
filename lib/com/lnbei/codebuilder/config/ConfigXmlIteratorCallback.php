<?php
namespace com\lnbei\codebuilder\config;

use com\lnbei\xml\XMLIteratorCallback;
use com\lnbei\html\core\data\ContentIteratorCallback;
use com\lnbei\html\core\tool\ArrayIteratorCallback;
class ConfigXmlIteratorCallback implements XMLIteratorCallback,ContentIteratorCallback,ArrayIteratorCallback
{
    private $attrArray;
    private $tempArray;//临时数组
    private $tempKey="";
    private $itrtatorArray;
    private $firstTagAttr;
    public $firstTagName;
    public function __construct(){
        $this->attrArray = array();
        $this->tempArray = array();
        $this->itrtatorArray = array();
    }
    public function call($xmlObj, $IDArray){
        $id = $IDArray['id'];
        $pid = $IDArray['pid'];
        $tag = $xmlObj->getName();
        $tempAttr = array();
        foreach ($xmlObj->attributes() as $key=>$v){
            $tempAttr[$key]=trim((String)$v);
        }
        $content = trim((String)$xmlObj);
        $gg = array('attr'=>$tempAttr,'id'=>$id,'pid'=>$pid,"content"=>$content,'tag'=>$tag);
        $this->attrArray[$pid][] = array('attr'=>$tempAttr,'id'=>$id,'pid'=>$pid,"content"=>$content,'tag'=>$tag);
    }
    public function getAttrArray(){
        return $this->attrArray;
    }
    public function getItrtatorArray(){
        return $this->itrtatorArray;
    }
    public function callback($tagobj, $tags, $bool){
        if($bool){
            $this->tempArray[$tagobj['content']]=$tagobj;
        }else{
            $tagobj['chilenTag'] = $this->tempArray;
            $this->itrtatorArray[$tagobj['tag']] = $tagobj;
            $this->tempArray = array();
        }
    }
    /**
     * 设置根标签属性
     * {@inheritDoc}
     * @see \com\lnbei\xml\XMLIteratorCallback::setFristTag()
     */
    public function setFristTag($data){
        $this->firstTagAttr = $data['attr'];
        $this->firstTagName = $data['tag'];
    }
    /**
     * 获取跟标签属性
     */
    public function getFristTagAttr(){
        return $this->firstTagAttr;
    }
}

?>