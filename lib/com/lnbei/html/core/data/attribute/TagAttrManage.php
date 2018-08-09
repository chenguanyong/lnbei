<?php
namespace com\lnbei\html\core\data\attribute;
use com\lnbei\file\File;
use com\lnbei\xml\Xmliteration;
use com\lnbei\html\core\data\ContentIterator;
use com\lnbei\html\core\tool\ArrayIterator;
class TagAttrManage
{
    /**
     * 存储标签属性
     * array("common"=>
     *              array("id"=>"string",
     *              "attr"=>array(),
     *              "id"=>"string",
     *              "pid"=>"string",
     *              "tag"=>"string",
     *              "content"=>"string",
     *              "childenTag"=>array(
     *                  "attr"=>array(
     *                      "id"=>"string",
     *                      "attr"=>array(),
     *                      "pid"=>"string",
     *                      "tag"=>"string",
     *                      "content"=>"string",
     *                      )
     *                      ,...
     *                  )
     *              ),
     *              ....
     * )
     * @var array
     */
    private $attrArray;
    /**
     * 标签模板路径
     * @var string
     */
    private $path;
    /**
     * 构造函数
     * @param string $path
     * @param string $bool
     */
    public function __construct($path,$bool = false){
        $this->attrArray = array();
        $this->path = $path;
        if($bool){
            self::init();
        }
    }
    /**
     * 初始化方法 
     */
    private function init(){
        $xmlstr = '';
        try {
            $xmlstr = File::fReadContex($this->path);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        $mTagAttrManage = new TagAttrXmlIteratorCallback();
        $xmllteration = new Xmliteration($xmlstr);
        $xmllteration->literation($mTagAttrManage);
        $attrArray = $mTagAttrManage->getAttrArray();
        $contentIterator = new ArrayIterator($attrArray);
        $onekey = '';
        $onekey=array_keys($attrArray)[0];
        if(empty($onekey)){
           throw new \Exception();
        }
        $contentIterator->getIterator($onekey,$mTagAttrManage);
        $this->attrArray = $mTagAttrManage->getItrtatorArray();
    }
    /**
     * 获取标签所有的属性
     * @param string $tag
     */
    public function getCommonAttr($tag){
        
        $tempArray = array();
        $tempArray['common'] = $this->attrArray['common'];
        if(empty($this->attrArray[$tag])){
            return $tempArray;
        }else{
            $tempArray[$tag] = $this->attrArray[$tag];
            return $tempArray;
        }
    }
    /**
     * 校验
     */
    public function checkAttr($tag,$attrName,$attrValue){
        $tempArray = self::getCommonAttr($tag);
        $tempTagAttr = array();
        if(empty($tempArray[$tag])){
            $tempTagAttr = $tempArray['common']['chilenTag'];
        }else{
            $tempTagAttr = array_merge($tempArray['common']['chilenTag'],$tempArray[$tag]['chilenTag']);
           
        } 
        
        if(!empty($tempTagAttr[$attrName])){
            $value = $tempTagAttr[$attrName]['attr'];
            //判断允许出现的
            if(!empty($value['invalid'])){
                $validArray = explode(",",$value['invalid']);
                foreach ($validArray as $k => $v){
                    if($v == $tag){
                        return false;
                    }
                }
            }
            //允许出现的标签
           if(!empty($value['valid'])){
                $validArray = explode(",",$value['valid']);
                $showBool= true;
                foreach ($validArray as $k => $v){
                    if($v == $tag){
                        $showBool = false;
                        break;
                    }
                }
                if($showBool){
                    return false;
                }
            }
            //测试属性的值
            if(!empty($value['value'])){
                $validArray = explode("|",$value['value']);
                $showBool= true;
                foreach ($validArray as $k => $v){
                    if(trim($v) == $attrValue){
                        $showBool = false;
                        break;
                    }
                }
                if($showBool){
                    return false;
                }
            }
        }
        return true;
    }
    public function checkAttrNoValue($tag,$attrName){
        $tempArray = self::getCommonAttr($tag);
        $tempTagAttr = array();
        if(empty($tempArray[$tag])){
            $tempTagAttr = $tempArray['common']['chilenTag'];
        }else{
            $tempTagAttr = array_merge($tempArray['common']['chilenTag'],$tempArray[$tag]['chilenTag']);
             
        }
        
        if(!empty($tempTagAttr[$attrName])){
            $value = $tempTagAttr[$attrName]['attr'];
            //判断允许出现的
            if(!empty($value['invalid'])){
                $validArray = explode(",",$value['invalid']);
                foreach ($validArray as $k => $v){
                    if($v == $tag){
                        return false;
                    }
                }
            }
            //允许出现的标签
            if(!empty($value['valid'])){
                $validArray = explode(",",$value['valid']);
                $showBool= true;
                foreach ($validArray as $k => $v){
                    if($v == $tag){
                        $showBool = false;
                        break;
                    }
                }
                if($showBool){
                    return false;
                }
            }
        }
        return true;
    }
    /**
     * 获取指定标签属性对象
     * @param string $tag
     */
    public function getTagAttribute($tag=''){
        return new TagAttribute(array(),$tag,$this);
    }
    /**
     * 获取所有指定标签的属性
     */
    public function getTagAllAttr($tag){
         $result = array();
         $tagAttr = $this->getCommonAttr($tag);
         if(empty($tagAttr[$tag])){
             $tempTagAttr = $tagAttr['common']['chilenTag'];
         }else{
             $tempTagAttr = array_merge($tagAttr['common']['chilenTag'],$tagAttr[$tag]['chilenTag']);
              
         }
         foreach ($tempTagAttr as $key=>$vlue){
             $bool = $this->checkAttrNoValue($tag, $key);
             if($bool){
                 $result[$key] = "";
             }
         }
         return $result;
    }
    
}

?>