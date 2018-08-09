<?php
namespace com\lnbei\html\widgettool\widgetlist;

use com\lnbei\xml\XMLIteratorCallback;
use com\lnbei\html\core\data\ContentIteratorCallback;
class WidgetListCallback implements XMLIteratorCallback,ContentIteratorCallback
{
    /**
     * 临时样式集合
     * @var
     */
    private $widgetNameXmlArray;
    private $widgetNameArray;
    /**
     * 临时数组
     * @var array
     */
    private $tempArray;
    /**
     * 配置文件节点属性
     * @var array
     */
    public $firstAttr;
    /**
     * 配置文件节点名称
     * @var unknown
     */
    public $firstName;
    private $temp;
    /**
     * 构造函数
     */
    public function __construct(){
        $this->widgetNameArray = array();
        $this->tempArray = array();
        $this->firstName = "";
        $this->firstAttr = array();
    }
    /**
     * 回调函数
     * {@inheritDoc}
     * @see \com\lnbei\xml\XMLIteratorCallback::call()
     */
    public function call($xmlObj, $IDArray){
        $id = $IDArray['id'];
        $pid = $IDArray['pid'];
        $xid = $IDArray['xid'];
        $xpid = $IDArray['xpid'];
        $tempAttr = array();
        $tag = $xmlObj->getName();
        foreach ($xmlObj->attributes() as $key=>$v){
            $tempAttr[$key]=(String)$v;
        }
        $content = trim((String)$xmlObj);
        $this->widgetNameXmlArray[$pid][] = array('xid'=>$xid,"xpid"=>$xpid,'id'=>$id,'pid'=>$pid,'attr'=>$tempAttr,'content'=>$content,'tag'=>$tag);
    }
    /**
     * 回调函数
     * {@inheritDoc}
     * @see \com\lnbei\html\core\data\ContentIteratorCallback::callback()
     */
    public function callback($tagobj, $tags, $bool){
        switch($tagobj['tag']){
            case 'dir':{
                $this->temp=$tagobj['attr']['name'];
                $this->widgetNameArray[$this->temp]=$tagobj;
                $this->widgetNameArray[$this->temp]['isparent']=true;
                $this->widgetNameArray[$this->temp]['childen'] = $this->tempArray;
                $this->tempArray = array();
            }break;
            case 'value':{
                $tagobj['isparent']=false;
                $this->tempArray[] = $tagobj;
                //$this->widgetNameArray[$this->temp]['isparent']=false;
            }break;
        }
    }

    /**
     * 设置根标签属性
     * {@inheritDoc}
     * @see \com\lnbei\xml\XMLIteratorCallback::setFristTag()
     */
    public function setFristTag($data){

        $this->firstAttr = $data['attr'];
        $this->firstName = $data['tag'];
    }
    /**
     * 获取跟标签属性
     */
    public function getWidgetNameAttr(){
        return $this->widgetNameArray;
    }
    public function getWidgetNameXmlAttr(){
        return $this->widgetNameXmlArray;
    }
}

?>