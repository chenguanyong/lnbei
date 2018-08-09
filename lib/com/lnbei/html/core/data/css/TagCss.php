<?php
namespace com\lnbei\html\core\data\css;

use com\lnbei\html\core\data\CSS;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\tag\TagManage;
class TagCss implements CSS
{
    /**
     * 样式数组
     * @var array 
     */
    private $cssArray;
    /**
     * 临时数组
     * @var array
     */
    private $tempCss;
    /**
     * 
     * @var TagManage
     */
    private $tagCssManage; 
    /**
     * 
     * @var string
     */
    private $tag;
    /**
     * 获取标签样式管理类对象
     */
    public function getTagCssManage(){
        return $this->tagCssManage;
    }
    /**
     * 构造函数
     */
    public function __construct($dataArray, $tag='', TagCssManage $tagCssManage=null){
        $this->cssArray = array();
        $this->tempCss = $dataArray;
        $this->tagCssManage = $tagCssManage;
        $this->tag = $tag;
    }
    /**
     * 转换函数
     * @return string
     */
    public function toString($tag =''){
        $css = '';
        foreach ($this->tempCss as $key=>$value){
           $bool = $this->tagCssManage->checkCss($key,$value);
           if(!empty($value)&& $bool){
             $css .= ";".$key.":".$value;
           }
        }
        return trim($css,';');
    }
    /**
     * 样式数组
     * @param array $cssArray
     */
    public function initCSS($cssArray){
        $this->cssArray = $this->tagCssManage->getCssArray();
        foreach ($cssArray as $key=>$value){
            if(!empty($this->cssArray[$key])){
                $this->tempCss[$key] = $value;
            }
        }
    }
    /**
     * 析构函数
     */
    public function __destruct(){
        $this->cssArray = null;
        $this->tempCss = null;
    }
    /**
     * 
     * @param string $key
     * @param string $value
     */
    public function setCss($key,$value){
        $result = $this->tagCssManage->checkCss($key,$value);
        if($result){
           $this->tempCss[$key] = $value;
           return true;
        }else{
            return false;
        }
    }
    /**
     * 
     * @param string $key
     */
    public function getCss($key){
        if(empty($this->tempCss[$key])){
            return $this->tempCss[$key];
        }else{
            return null;
        }
    }
    /**
     * 获取Css样式数组
     */
    public function getCssArray(){
        return $this->cssArray;
    }
    /**
     * 设置Css样式数组
     */
    public function setCssArray($cssArray){
        $this->cssArray = $cssArray;
    }
    /**
     * 清除Css属性
     * @param unknown $key
     */
    public function unSetCss($key){
        unset($this->cssArray[$key]);
    }
    /**
     * 
     */
    public function getOutputTagCssAttr(){
        $tempTagCssAttrArray = array();
        $tempTagCssAttrArray = $this->tagCssManage->getCssArray();
        $tempTagCssAttrArrayS = array_map(function (){
            return "";
        }, $tempTagCssAttrArray);
        foreach ($this->cssArray as $key=>$value){
            if(!empty($tempTagCssAttrArrayS[$key])){
                $tempTagCssAttrArrayS[$key] = $value;
            }
        }
        return $tempTagCssAttrArrayS;
    }
}

?>