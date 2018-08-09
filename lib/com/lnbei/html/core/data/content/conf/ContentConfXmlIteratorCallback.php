<?php
namespace com\lnbei\html\core\data\content\conf;

use com\lnbei\xml\XMLIteratorCallback;
use com\lnbei\html\core\data\ContentIteratorCallback;
class ContentConfXmlIteratorCallback implements XMLIteratorCallback,ContentIteratorCallback
{
    private $confArray;
    private $conf;
    private $temp='';
    public function __construct(){
        $this->confArray = array();
    }
    public function call($xmlObj, $IDArray){
        $tag = $xmlObj->getName();//标签的名称
        $id = $IDArray['id'];
        $pid = $IDArray['pid'];
        $tempAttr = array();
        foreach ($xmlObj->attributes() as $key=>$v){
            $tempAttr[$key]=$v;
        }
        $content = $xmlObj;
        $this->confArray[$pid][] = ['attr'=>$tempAttr,'id'=>$id,'pid'=>$pid,"content"=>$content,'tag'=>$tag];
    }
    //
    public function getConfArray(){
        return $this->confArray;
    }
    public function getConf(){
        return $this->conf;
    }
    //
    public function callback($array, $tags, $bool){
        
        switch($array['tag']){
            case 'db':{$this->temp='db';}break;
            case 'manual':{$this->temp='manual';}break;
            case 'auto':{$this->temp='auto';}break;
            case 'field':{$this->conf[$this->temp][]=$array['content'];}break;
        }
    }
    public function setFristTag($data){
        
    }
}

?>