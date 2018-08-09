<?php
namespace com\lnbei\html\tag;

use com\lnbei\xml\XMLTool;
use com\lnbei\html\tag\xml\TagConfigXmlToolCallback;
use com\lnbei\file\File;
class TagManage
{
   /**
    * 标签名集合
    * @var array
    */
   private $tagArray;
   /**
    * 路径  
    * @var string
    */
   private $path;
   /**
    * 构造函数
    * @param string $path
    * @param string $bool
    */
   public function __construct($path,$bool=false){
       $this->tagArray = array();
       $this->path = $path;
       if($bool){
            self::init();
       }
   }
   /**
    * 获取标签数量
    */
   public function getTagCount(){
       return count($this->tagArray);
   }
   /**
    * 获取标签名集合
    */
   public function getTagArray(){
       return $this->tagArray;
   }
   /**
    * 初始化函数
    * @throws \Exception
    */
   private function init(){
       $filexml = File::fReadContex($this->path);
       if($filexml == FALSE){
           throw new \Exception();
       }
       $xmlTool = new XMLTool($filexml);
       $mTagConfigXmlToolCallback = new TagConfigXmlToolCallback();
       $xmlTool->xmlIterators($mTagConfigXmlToolCallback);//
       if($mTagConfigXmlToolCallback->getTagCount() > 0){
          $this->tagArray = $mTagConfigXmlToolCallback->getTagArray(); 
       }else{
           throw new \Exception();
       }
   }
}

?>