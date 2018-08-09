<?php
namespace com\lnbei\html\core\data\css;

use com\lnbei\html\core\data\CSS;
use com\lnbei\html\core\data\ContentIterator;
use com\lnbei\file\File;
use com\lnbei\xml\Xmliteration;
class TagCssManage implements CSS
{   
    /**
     *array(
     *'width'=>array(
     *          "id"=>"String",
     *          "pid"=>"String",
     *          "attr"=>array(),
     *          "content"=>"string",
     *          "tag"=>"string",
     *          "childen"=>array()//属性可能存在的值
     *          )
     *          ....
     *); 
     * @var array
     */
    private $cssArray;
    /**
     * css规则模板路径
     * @var String 
     */
    private $path;
    /**
     * 构造函数
     * @param string $path
     * @param bool $bool
     */
    public function __construct($path,$bool = false){
        $this->cssArray = array();   
        $this->path = $path;
        if($bool){
            self::init();
        }
    }
    /**
     * 初始化函数
     * @throws \Exception
     */
    private function init(){
       
        $xmlstr = '';
        $temp = array();
        try {
            $xmlstr = File::fReadContex($this->path);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        $mTagCss = new TagCssCallback();
        $xmllteration = new Xmliteration($xmlstr);
        $xmllteration->literation($mTagCss);
        $temp = $mTagCss->getTagCssArray();
        $onekey = '';
        $onekey=array_keys($temp)[0];
        if(empty($onekey)){
           throw new \Exception();
        } 
        $mContentIterator = new ContentIterator($temp);
        $mContentIterator->runIteration($mTagCss,$onekey);
        $this->cssArray = $mTagCss->getTagCss();
        
    }
    //
    public function getCssArray(){
        return $this->cssArray;
    }
    //析构函数
    public function __destruct(){
        $this->cssArray = null;
        $this->path = null;
    }
    public function toString($tag){
        return "";
    }
    /**
     * 处理Css属性规则
     * @param String $key
     * @param String $cssValue
     */
    public function checkCss($key,$cssValue){
        $key = trim($key);
        if(!empty($this->cssArray[$key])&&!empty($this->cssArray[$key]['childen'])){
            $tempArray = $this->cssArray[$key]['childen'];
            foreach ($tempArray as $key=>$value){
                if(!empty($value['content'])) {
                  $rs = explode("|", $value['content']);
                  if(count($rs)>1){
                     $result = self::param($value, $cssValue);
                     if($result){
                         return $result;
                     }
                  }else{
                     $values = trim($value['content']);
                     $paramName = explode("_",$values);
                     $functionName = $paramName[0];
                     $result =self::$functionName($value,$cssValue); 
                     if($result){
                         return $result;
                     }
                  }
                }else{
                  return  $result = true;
                }
              }
        }
        return false;
    }
    /**
     * 处理css属性规则
     * @param String  $attrKey//输入的属性名
     * @param String  $cssValue//输入的css 属性值
     * @param String  $attrValue//标签属性值
     * @param String  $attrContent //标签value 值
     */
    private function doAttr($attrKey,$attrValue,$attrContent,$cssValue){
        switch(trim($attrKey)){
            case "type":{
                if($attrValue == 'fun'){
                 $r = preg_match('/'.trim($attrContent).'\((.*?)\)/',$cssValue);
                 if($r === False ||$r == 0){
                     return false;
                 }
                }else{
                    return true;
                }
            }break;
            case "unit":{
                $temp = explode(",", trim($attrValue));
                $rightFloag = 0;
                foreach ($temp as $v=>$k){
                    $r = preg_match('/\d*?'.trim($k).'/',$cssValue);
                    if($r === False ){
                        return false;
                    } 
                    if($r == 1){
                        $rightFloag = 1;
                        break;
                    }
                }
                if($rightFloag == 1){
                    return true;
                }else{
                    return false;
                }
                
            }break;
        }
    }
    
    /**
     * 获取TagCss对象
     */
    public function getTagCss($tag){
        return new TagCss(array(),$tag,$this);
    }
    
    /**
     * 处理attname
     * 
     */
    private function ATTNAME($ruleData,$value){
       $attr = $ruleData['attr']; 
       $attrnamevalue = $attr['attrnamevalue'];
       $attrnamevalues = explode('|',$attrnamevalue);
       foreach ($attrnamevalues as $k=>$v){
           
           if(!empty($this->cssArray[$v])&&!empty($this->cssArray[$v]['childen'])){
               $result = self::checkCss($v, $value);
               if($result){
                   return true;
               }
           }
       }
       
       $value = trim($value);
       $values = explode(" ",$value);
       if(@$ruleData['flag'] == 1){
           foreach ($values as $k=>$v){
               if(!in_array($v, $attrnamevalues)){
                   return false;
               }else{
                   return true;
               }
           }
       }else{
           if(in_array($v, $attrnamevalues)){
               return true;
           }else{
               return false;
           }
       }
       return false;
    }
    /**
     * 处理是none规则
     * @param unknown $data
     * @param unknown $value
     * @return boolean
     */
    private function none($data,$value){
        if($value == "none"){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 处理inherit规则
     * @param unknown $data
     * @param unknown $value
     */
    private function inherit($data,$value){
        if($value == "inherit"){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 处理default规则
     * @param unknown $data
     * @param unknown $value
     */
    private function defaults($data,$value){
        $attrValue = $data['attr']['value'];
        if($value == $attrValue ){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 处理16进制
     * @param unknown $data
     * @param unknown $value
     */
   private function hex($data,$value){
       $r = preg_match('/#[0-9,a-f,A-F]{3,6}/',$value);
       if($r == false && $r=0){
           return false;
       }else{
           return true;
       }
   }
   /**
    * 处理rgb
    * @param unknown $data
    * @param unknown $cssValue
    */
   private function rgb($data,$cssValue){
       $attrType = $data['attr']['type'];
       if($attrType == 'fun'){
           $r = preg_match('/'.trim($data['content']).'\((.*?)\)/',$cssValue);
           if($r === False ||$r == 0){
               return false;
           }
       }else{
           return true;
       } 
   }
   /**
    * 处理url
    * @param unknown $data
    * @param unknown $cssValue
    */
   private function url($data,$cssValue){
       $attrType = $data['attr']['type'];
       if($attrType == 'fun'){
           $r = preg_match('/'.trim($data['content']).'\((.*?)\)/',$cssValue);
           if($r === False ||$r == 0){
               return false;
           }
       }else{
           return true;
       }
   }
   /**
    * 处理参数
    * @param unknown $data
    * @param unknown $cssValue
    */
   
   private function param($data,$cssValue){
       $attrUnit = $data['attr']['unit'];
       $attrUnits = explode("|", $attrUnit);
       $attrContent = trim($data['content']);
       $cssvalues = explode(" ", $cssValue);
       $length = count($cssvalues);
       $attrContent=str_replace("param_", "", $attrContent);
       $attrCssValue = explode("|", $attrContent);
       if(!in_array($length, $attrCssValue)){
           return false;
       }
       foreach ($cssvalues as $key=>$value){
           //$temp = explode(",", trim($cssValue));
           $rightFloag = 0;
           foreach ($attrUnits as $v=>$k){
               $r = preg_match('/\d*?'.trim($k).'/',$value);
               if($r === False ){
                   return false;
               }
               if($r == 1){
                   $rightFloag = 1;
                   break;
               }
           }
           if($rightFloag == 1){
               return true;
           }else{
               return false;
           }
       }
      return true; 
   }
   private function length($data,$cssValue){
       $temp = explode("|", trim($data['attr']['unit']));
       $rightFloag = 0;
       foreach ($temp as $v=>$k){
           $r = preg_match('/^[0-9]*?'.trim($k).'/',$cssValue);
           if($r === False ){
               return false;
           }
           if($r == 1){
               $rightFloag = 1;
               break;
           }
       }
       if($rightFloag == 1){
           return true;
       }else{
           return false;
       }
       return true;
   }
   public function auto($data,$cssValue){
       return true;
   }
}
?>