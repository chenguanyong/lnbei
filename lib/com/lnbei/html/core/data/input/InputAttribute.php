<?php
namespace com\lnbei\html\core\data\input;
use com\lnbei\html\Page;
use com\lnbei\html\tag\Tag;
//获取标签的属性
class InputAttribute
{   
     /**
      * 
      * @var Tag
      */
     private $tag; 
     /**
      * 构造函数
      * @param Page $page
      */
     public function __construct(Tag $tag){
         $this->tag = $tag;
     }
     /**
      * 处理标签属性和样式
      * @param unknown $dataArray
      * @param string $flag
      */
     public function handleAttrAndCss($dataArray,$flag=false){
         if($flag){
             foreach ($dataArray as $key=>$value){
                $temp = $this->tag->setTagAttr($key, $value);
                if(!$temp){
                    return false;
                }
             } 
         }else{
             foreach ($dataArray as $key=>$value){
                $temp = $this->tag->setTagCssValue($key, $value);
                 if(!$temp){
                     return false;
                 }
             }             
         }
         return true;
     }
     /**
      * 添加内容
      * @param unknown $str
      */
     public function addContent($str){
         $this->tag->setContent($str);
     }
            
}

?>