<?php
namespace com\lnbei\html\core\data\attribute;
use com\lnbei\html\core\data\Attribute;
class TagAttribute implements Attribute
{
    /**
     * 属性数组
     * @var array
     * 一维数组
     * array("key"=>"",
     * "..."=>"..."
     * )
     */
    private $attrArray;
    /**
     * 
     * @var TagAttrManage
     */
    private $tagAttrManage;
    /**
     * 规则对象
     * @var Rule
     */
    private $rule;
    /**
     * 所属标签 
     * @var string
     */
    private $tag;
    /**
     * 
     * @param string $attrArray
     * @param string $tag
     * @param TagAttrManage $tagAttrManage
     */
    public function __construct($attrArray,$tag = '',TagAttrManage $tagAttrManage = null){
        $this->attrArray = $attrArray;
        $this->tagAttrManage = $tagAttrManage;
        $this->tag = $tag;
    }
    /**
     * 转换字符串
     */
    public function toString(){
        $str = "";
        unset($this->attrArray['style']);
        //$this->attrArray = array_unique($this->attrArray);
        foreach ($this->attrArray as $key=>$value){
            $bool = $this->tagAttrManage->checkAttr($this->tag,$key,$value);
            if(!empty($value)&&$bool){
              $str .= " " . $key . "=\"".$value . "\" ";
            }
        }
        return $str;
    }
    /**
     * 设置属性
     * @param string $key
     * @param string $value
     */
    public function setAttr($key,$value){
        $bool = $this->tagAttrManage->checkAttr($this->tag,$key,$value);
        if($bool){
            $this->attrArray[$key]=$value;
            return true;
        }else{
            return false;
        }
    }
    /**
     * 获取属性
     * @param string $key
     */
    public function getAttr($key){
        if(!empty($this->attrArray[$key])){
            return $this->attrArray[$key];
        }else{
            return null;
        }
    }
    /**
     * 获取标签属性管理器
     */
    public function getTagAttrManage(){
        return $this->tagAttrManage;
    }
    /**
     * 获取标签属性
     */
    public function getAttrArray(){
        return $this->attrArray;
    }
    /**
     * 设置标签
     */
    public function setAttrArray($dataArray){
        $this->attrArray = $dataArray;
    }
    /**
     * 清除属性
     */
    public function unSetAttr($key){
        unset($this->attrArray[$key]);
    }
    /**
     * 获取要输出的标签属性
     */
    public function getAttrForOutput(){
        $result = array();
        $divAttr = $this->tagAttrManage->getTagAllAttr($this->tag);
        $result = $divAttr;
        foreach ($this->attrArray as $key=>$value){
            $result[$key] = $value;
        }
        return $result;
    }
}

?>