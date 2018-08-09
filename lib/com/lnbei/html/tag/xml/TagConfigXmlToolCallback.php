<?php
namespace com\lnbei\html\tag\xml;

use com\lnbei\xml\XmlToolCallback;
class TagConfigXmlToolCallback implements XmlToolCallback
{
    /**
     * 标签名集合
     * @var array
     */
    private $tagArray;
    /**
     * 构造函数
     */
    public function __construct(){
        $this->tagArray = array();
    }
    /**
     * 回调函数
     * {@inheritDoc}
     * @see \com\lnbei\xml\XmlToolCallback::call()
     */
    public function call($xmlobj){
        $keys = (String)$xmlobj;
        $this->tagArray[$keys] = array();
        foreach ($xmlobj->attributes() as $key=>$value){
            $this->tagArray[$keys][$key] = (String)$value;
        }
        foreach ($xmlobj->children() as $second_gen) {
            $this->tagArray[$second_gen] = array();
            foreach ($xmlobj->attributes() as $key=>$value){
                $this->tagArray[$second_gen][$key] = $value;
            }
        }
    }
    /**
     * 获取tag数量
     */
    public function getTagCount(){
        return count($this->tagArray);
    }
    /**
     * 获取tag数据
     */
    public function getTagArray(){
        return $this->tagArray;
    }
}

?>