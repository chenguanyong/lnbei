<?php
namespace com\lnbei\html\widget;
use com\lnbei\file\File;
use com\lnbei\html\core\config\WidgetInitXmlIterationCallback;
use com\lnbei\xml\Xmliteration;
use com\lnbei\html\core\data\ContentIteratorCallback;
use com\lnbei\html\core\data\ContentIterator;
use com\lnbei\html\core\rule\Rule;
use com\lnbei\html\tag\Tag;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
/**
 * 基于bootstrap的控件php模板
 * @author Administrator
 *
 */
class Widget implements ContentIteratorCallback
{
    /**
     * 标签对象集合
     * @var array $widgetArray
     */
    protected $widgetArray;
    /**
     * 
     * @var Rule $rule
     */
    protected $rule;
    /**
     * 路径
     * @var string $path
     */
    public $path;
    /**
     * 控件模板xml文件的根标签属性
     * @var Array
     */
    private $widgetAttr;
    /**
     * 版本号
     * @var string $version
     */
    private $version = '0.0.0';//版本信息
    /**
     * 
     * @param string $path
     * @param bool $bool
     */
    public function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage,$path,$bool=false){
        $this->widgetArray = array();
        $this->path = $path;
        $this->rule = new Rule(array(),false);
        if($bool){
            self::init($tagManage,$tagCssManage,$tagAttrManage);
        }
    }
    /**
     * 初始化函数
     */
    private function init(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage){
        $xmlstr = '';
        try {
            $xmlstr = File::fReadContex($this->path);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        self::initByHtml($xmlstr,$tagManage,$tagCssManage,$tagAttrManage);        
//         $mWidgetInitXmlIterationCallback = new WidgetInitXmlIterationCallback($tagManage,$tagCssManage,$tagAttrManage,$this->rule);
//         $xmllteration = new Xmliteration($xmlstr);
//         $xmllteration->literation($mWidgetInitXmlIterationCallback);
//         $this->widgetArray = $mWidgetInitXmlIterationCallback->getTagWidget();//xml转换成HTML
//        /*
//         * 根标签属性
//         */
//         $this->widgetAttr = $mWidgetInitXmlIterationCallback->getWidgetAttr();
//         /*
//          *规则处理 
//          */
//         $this->rule ->setRuleArray($mWidgetInitXmlIterationCallback->getSystemRuleArray());
//         $this->rule->refresh();//刷新规则
    }

    //
    /**
     * 添加子套件
     * @param int $parentID
     * @param Widget $widget
     * @return boolean
     */
    public function addChildrenWidget($pid,Widget $widget){
        if(!($widget instanceof Widget)){
          return false;
        }
        self::mergeWidgetRule($widget);
        $widgets = self::tagIteration($this, '', $pid, 'addWidgeCallback');
        $widgets->addWidgetArray($pid, $widget);
        $widgets = null;
        $widget = null;
        return true;
    }
    /**
     * 获取套件原始数据
     */
    public function getWidgetArray(){
        return $this->widgetArray;
    }
    /**
     * 
     * @param array $widgetArray
     */
    public function setWidgetArray($widgetArray){
        $this->widgetArray = $widgetArray;
    }
    /**
     * 套件转换成字符串
     */
    public function widgetToString($Ikey=""){

        foreach ($this->widgetArray as $key=>$value){
            $this->widgetArray[$key] = array_values($this->widgetArray[$key]) ;
        }
        
        $contentIterator = new ContentIterator($this->widgetArray);
        $keys=array_keys($this->widgetArray);
        if(empty($keys)){
            return null;
        }
        
        $tempKey = "";
        if(empty($Ikey)){
            $tempKey = $keys[0];           
        }else{            
            $tempKey = $Ikey;
        }
       $str = $contentIterator->runContentIteration($this, $tempKey);
       return $str;//$contentIterator->runContentIteration($this, $tempKey);
    }
    /**
     * 
     * @param Tag $tagobj
     * @param string $tags
     * @param bool $bool
     */
    public function callback($tagobj,$tags,$bool){
        /**
        * 如果传入的$tagObj是控件。直接转换成Html；
        */
        if($tagobj instanceof Widget){
            return $tagobj->widgetToString();
        }
        if(!$bool){
            $tagobj->setTempContent($tags);
        }
        $str = $tagobj->reDraw();
        return $str;
    }
    /**
     * 由ID获取套件内的标签对象
     * @param string $id
     * @return Tag $v
     */
    public function getElementByLBID($id,$pid=''){
        return self::tagIteration($this, $pid, $id, 'getTagObjectCallBack');
    }
    /**
     * 
     * @param array $arr
     * @param boolean $bool
     */
    protected function sort($arr,$bool=false){
        for($i=0;$i<count($arr)-1;$i++){
            for($j=$i+1;$j<count($arr);$j++){
                $obj1 =  $arr[$i];
                $obj2 =  $arr[$j];
                if($bool){
                    if($obj1->getXid()<$obj2->getXid()){
                        $g = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $g;
                    }
                }else{
                    if($obj1->getXid()>$obj2->getXid()){
                        $g = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $g;
                    }
                }
            }
        }
       return $arr; 
    }
    /**
     * 标签对象排序 
     */
    protected function sortTag(){
        foreach ($this->widgetArray as $key=>$value){
            $this->widgetArray[$key] = self::sort($value, false);
        }
    }
    /**
     * 获取套件的name
     */
    public function getName(){
        return (String)$this->widgetAttr['name'];
    }
    /**
     * 获取套件属性
     */
    public function getAttr($key){
        return $this->widgetAttr[$key];
    }
    /**
     * 删除控件
     */
    public function deleWidgetOrTagByID($id,$pid=''){
        self::tagIteration($this, $pid, $id, 'deleTagCallback');
    }
    /**
     * 获取标签对象
     */
    private function getTagObjectCallBack($key,$key1,$widget,$tag){
        return $tag;
    }
    public $i=0;
    /**
     * 控件数据迭代
     * @param widget $widget 控件的原始数据
     * @param string $pid 标签的父ID
     * @param string $id 查询条件
     * @param callback $function 回调函数
     * @return Widget $widget 返回
     */
    private function tagIteration($widget,$pid,$id,$function){
        $this->i++;
        if(empty($id)){
            return $widget;
        }
        $widgetArray = $widget->getWidgetArray();

        $tempId = '';
        //修改20180705625
       /**
        * if(empty($pid))
        */
        if(empty($pid) || empty($widgetArray[$pid]) ){
            foreach ($widget->getWidgetArray() as $key=>&$value){
                foreach ($value as $k=>&$v){
                    if($v instanceof Widget){
                        $result = self::tagIteration($widget->getWidgetArrayByKey($key,$k), $pid, $id, $function);
                        if($result != false){
                            return $result;
                        }
                    }else{
                         $tempId = $v->getSid();   
                         if($tempId == $id){
                            return self::$function($key,$k,$widget,$v);
                         }   
                    }  
                }
            }
        }elseif(!empty($widgetArray[$pid])){
           
            foreach ($widgetArray[$pid] as $k=>&$v){
                if($v instanceof Widget){
                    $result = self::tagIteration($widget->getWidgetArrayByKey($pid,$k), $pid, $id, $function);
                    if($result != false){
                        return $result;
                    }
                }else{
                    $tempId = $v->getSid();
                    if($tempId == $id){
                        return self::$function($pid,$k,$widget,$v);//self::deleTagIterationByPid($widgetArray, $tempId);
                    }
                }
            }
        }else{
//             var_dump($this->i);
//             var_dump($widgetArray);
//            // var_dump($widgetArray[$pid]);
//             var_dump(!empty($widgetArray[$pid]));
//             var_dump($pid);
           
//             exit();
            return $widget;
        }
    }
   private function deleTagCallback($key,$key1,$widget,$tag){
       $tempId = $tag->getSid();
       $widget->deleWidgetArray($key,$key1);
       $resultWidget = self::deleTagIterationByPid($widget, $tempId);
       $widget->deleWidgetByPid($tempId);
       return $resultWidget;
   }
   private function deleTagIterationByPid($widget,$pid){
       $widgetArray = $widget->getWidgetArray();
       if(empty($widgetArray[$pid])){
           return $widget;
       }
       foreach ($widgetArray[$pid] as $key=>$value){
           
           if($value instanceof Widget){
               $tempKey = $value -> getWidgetArrayFristKey();
               if(!empty($tempKey)){
                   return self::deleTagIterationByPid($widget, $tempSid);
               }else{
                   return $value;
               }
           }
           $tempSid = $value->getSid();
           if(empty($widgetArray[$tempSid])){
              //unset($widgetArray[$pid][$key]);
              $widget->deleWidgetArray($pid,$key);
              return $widget;
           }else{
              return self::deleTagIterationByPid($widget, $tempSid);
           }
       }
   }
   /**
    * 移动tag标签
    * @param array $widgetArray
    * @param string $pid
    * @param array $result
    * @return boolean
    */
   private function moveTagIterationByPid($widget,$pid,$result=array()){
       $widgetArray = $widget->getWidgetArray();
       if(empty($widgetArray[$pid])){
           return $result;
       }
       foreach ($widgetArray[$pid] as $key=>$value){
           $tempSid = $value->getSid();
           if(empty($widgetArray[$tempSid])){
               $result[$pid][$key] = $widgetArray[$pid][$key];
               $widget->deleWidgetArray($pid,$key);
               return $result;
           }else{
               return self::moveTagIterationByPid($widget, $tempSid,$result);
           }
       }
   }
   private function moveTagCallback($key,$key1,$widget,$tag){
       $tempId = $tag->getSid();
       //unset($WidgetArray[$key][$key1]);
       $result = array();
       $result['root'][] = $widget->getWidgetArrayByKey($key,$key1);

       $widget->deleWidgetArray($key,$key1);
       $result = self::moveTagIterationByPid($widget, $tempId,$result);
       $widget->deleWidgetByPid($tempId);
       return $result;
   }
   /**
    * 获取需要粘贴的标签
    * @param unknown $widget
    * @param unknown $pid
    * @param array $result
    */
   private function pasteTagIterationByPid($widget,$pid,$result=array()){
       $widgetArray = $widget->getWidgetArray();
       if(empty($widgetArray[$pid])){
           return $result;
       }
       foreach ($widgetArray[$pid] as $key=>$value){
           $tempSid = $value->getSid();
           if(empty($widgetArray[$tempSid])){
               $result[$pid][$key] = $widgetArray[$pid][$key];
               return $result;
           }else{
               return self::pasteTagIterationByPid($widget, $tempSid,$result);
           }
       }
   }
   /**
    * 粘贴标签
    * @param unknown $key
    * @param unknown $key1
    * @param unknown $widget
    * @param unknown $tag
    */
   private function pasteTagCallback($key,$key1,$widget,$tag){
       $tempId = $tag->getSid();
       //unset($WidgetArray[$key][$key1]);
       $result = array();
       $result['root'][] = $widget->getWidgetArrayByKey($key,$key1);
       $result = self::moveTagIterationByPid($widget, $tempId,$result);
       return $result;
   }
   public function moveTag($toID,$toPID,$fromID,$fromPID){
        $toWidget = self::tagIteration($this, $toPID, $toID, 'addWidgeCallback');
        //$vat = self::getElementByLBID($fromID,$fromPID);
         //var_dump($vat);
         //exit;
        $fromArray = self::tagIteration($this, $fromPID, $fromID, 'moveTagCallback');
//          var_dump($fromArray);
// //         ;
//          exit("ddd");
//         $toWidget->addWidgetArray($toID, $fromArray)
//         echo  $fromArray->widgetToString();
//         var_dump($fromArray);
//         exit;
        if($fromArray['root'][0] instanceof Widget){
            $toWidget->addWidgetArray($toID, $fromArray['root'][0]);
            unset($fromArray['root']);
            $widgetArray = $fromArray;//$widget->getWidgetArray();
            foreach ($widgetArray as $key=>$value){
                $toWidget->addWidgetArray($key, $value);//[$key][] = $value;
            }
            
        }else {

           $toWidget->addWidgetArrayTag($toID,$fromArray['root'][0]);
           // var_dump($toWidget->getWidgetArray());
        }
        
        return true;
   }
   private function addWidgeCallback($key,$key1,$widget,$tag){
       return $widget;
   }
   public function addWidgetArray($key,Widget $obj){
       $obj->doWidgetArrayFristPUUID($key);
       $this->widgetArray[$key][]=$obj;
   }
   public function deleWidgetArray($key,$key1){
       $tag = $this->widgetArray[$key][$key1];
       /*
        * 删除相对应的规则
        */
       if(!empty($tag)){
           $id = $tag->getSid();
           $parent = $tag->getParent();
           $this->rule->deleRule($parent, $id);
       }
       unset($this->widgetArray[$key][$key1]);
       
       //$this->widgetArray[$key] = array_values($this->widgetArray[$key]);
   }
   public function getWidgetArrayByKey($key,$key1){
       return $this->widgetArray[$key][$key1];
   }
   private function deleWidgetByPid($key){
       if(empty($this->widgetArray[$key])){
            unset($this->widgetArray[$key]);
       }
   }
   /**
    * 套件合并是规则合并
    */
   private function mergeWidgetRule(Widget $widget){
       $ruleArray = $widget->getRule()->getRuleArray();
       $this->rule->addRuleArray($ruleArray);
       //$widget->setRule($this->rule);
   }
   public function getRule(){
       return $this->rule;
   }
   /**
    * 设置规则对象
    */
   public function setRule($rule){
       $this->rule = $rule;
   }
   /**
    * 初始化
    */
   public function initByHtml($xmlstr,$tagManage,$tagCssManage,$tagAttrManage){
       
       $mWidgetInitXmlIterationCallback = new WidgetInitXmlIterationCallback($tagManage,$tagCssManage,$tagAttrManage,$this->rule);
       $xmllteration = new Xmliteration($xmlstr);
       $xmllteration->literation($mWidgetInitXmlIterationCallback);
       $this->widgetArray = $mWidgetInitXmlIterationCallback->getTagWidget();//xml转换成HTML
       /*
        * 根标签属性
        */
       $this->widgetAttr = $mWidgetInitXmlIterationCallback->getWidgetAttr();
       /*
        *规则处理
        */
       $this->rule ->setRuleArray($mWidgetInitXmlIterationCallback->getSystemRuleArray());
       $this->rule->refresh();//刷新规则
   }

   /**
    * 选择器
    */
   public function selector(Tag $tag,$where,&$data){
      /**
       * id
       * 
       */
       $pattern = '/^#([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)$/i';
       $int_return = preg_match_all($pattern, $where, $array_information);
       $name = "";
       if($int_return != 0){
           $name=$array_information[1][0];
           $id = $tag->getTagAttr("id");
           if(!empty($id)&&$name == $id){
               $data[] = $tag;
               return true;
           }else{
               return false;
           }
       }
       //html标签
       $pattern = '/^([a-z,A-Z][a-z,A-Z,0-9]*)$/i';
       $int_return = preg_match_all($pattern, $where, $array_information);
       $name = "";
       if($int_return != 0){
           $name=$array_information[1][0];
           $tagName = $tag->getTag();
           if(!empty($tagName)&&$name == $tagName){
               $data[] = $tag;
               return true;
           }else{
               return false;
           }
       }
       
       //css类
       $pattern = '/^\.([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)$/i';
       $int_return = preg_match_all($pattern, $where, $array_information);
       $name = "";
       if($int_return != 0){
           $name=$array_information[1][0];
           $class = $tag->getTagAttr("class");
           if(!empty($class)&&$name == $class){
               $data[] = $tag;
               return true;
           }else{
               return false;
           }
       }
       //html属性[attr]
       $pattern = '/^\[([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)\]$/i';
       $int_return = preg_match_all($pattern, $where, $array_information);
       $name = "";
       if($int_return != 0){
           $name=$array_information[1][0];
           $attr = $tag->getTagAttr($name);
           if(!empty($attr)){
               $data[] = $tag;
               return true;
           }else{
               return false;
           }
       }
       //html属性[attr=value]
       $pattern = '/^\[([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*=[A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)\]$/i';
       $int_return = preg_match_all($pattern, $where, $array_information);
       $name = "";
       $key = "";
       $value = "";
       if($int_return != 0){
           $name=$array_information[1][0];
           $name = explode("=", $name);
           $key = $name[0];
           $value = $name[1];
           $attrValue = $tag->getTagAttr($key);
           if(!empty($attrValue)&&$attrValue == $value){
               $data[] = $tag;
               return true;
           }else{
               return false;
           }
       }
       //html标签id[attr=value]
       $pattern = '/^#([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)\[([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*=[A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)\]$/i';
       $int_return = preg_match_all($pattern, $where, $array_information);
       $name = "";
       $key = "";
       $value = "";
       if($int_return != 0){
           $id = $array_information[1][0];
           $name=$array_information[2][0];
           $name = explode("=", $name);
           $key = $name[0];
           $value = $name[1];
           $idValue = $tag->getTagAttr("id");
           $attrValue = $tag->getTagAttr($key);
           if(!empty($idValue)&&!empty($attrValue)&&$idValue==$id&&$attrValue ==$value){
               $data[] = $tag;
               return true;
           }else{
               return false;
           }
       }
       //html标签类[attr=value]
       $pattern = '/^\.([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)\[([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*=[A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)\]$/i';
       $int_return = preg_match_all($pattern, $where, $array_information);
       $name = "";
       $key = "";
       $value = "";
       if($int_return != 0){
           $class = $array_information[1][0];
           $name=$array_information[2][0];
           $name = explode("=", $name);
           $key = $name[0];
           $value = $name[1];
           $classValue = $tag->getTagAttr("class");
           $attrValue = $tag->getTagAttr($key);
           if(!empty($classValue)&&!empty($attrValue)&&$classValue==$class&&$attrValue ==$value){
               $data[] = $tag;
               return true;
           }else{
               return false;
           }
       }
       //html标签[attr=value]
       $pattern = '/^([A-Z,a-z][A-Z,a-z,0-9]*)\[([A-Z,a-z,_][A-Z,a-z,_,0-9,-]*=[A-Z,a-z,_][A-Z,a-z,_,0-9,-]*)\]$/i';
       $int_return = preg_match_all($pattern, $where, $array_information);
       $name = "";
       $key = "";
       $value = "";
       if($int_return != 0){
           $tagName = $array_information[1][0];
           $name=$array_information[2][0];
           $name = explode("=", $name);
           $key = $name[0];
           $value = $name[1];
           $tagName1 = $tag->getTag();
           $attrValue = $tag->getTagAttr($key);
           if(!empty($tagName1)&&!empty($attrValue)&&$tagName1==$tagName&&$attrValue ==$value){
               $data[] = $tag;
               return true;
           }else{
               return false;
           }
           
       }
   }
   /**
    * 控件数据迭代
    * @param widget $widget 控件的原始数据
    * @param string $pid 标签的父ID
    * @param string $where 查询条件
    * @param callback $function 回调函数
    * @return Widget $widget 返回
    */
   private function iteration($widget,$where,&$backData=array()){
       foreach ($widget->getWidgetArray() as $key=>&$value){
           foreach ($value as $k=>&$v){
               if($v instanceof Widget){
                   $result = self::iteration($widget->getWidgetArrayByKey($key,$k), $where, $backData);
                   if($result != false){
                       return $result;
                   }
               }else{
                  $str = self::selector($v, $where, $backData);
               }
           }
       }
       return $backData;
   }
   /**
    * 根据标签的特性获取标签
    * @param unknown $where
    * @return \com\lnbei\html\widget\Widget
    */
   public function getElementBySelector($where){
       return self::iteration($this, $where);
   }
   public function doWidgetArrayFristPUUID($PUUID){
       $tempKeysArray = array_keys($this->widgetArray);
       if(empty($tempKeysArray)){
           return false;
       }
       foreach ($this->widgetArray[$tempKeysArray[0]] as $key=>$value){
           $this->widgetArray[$tempKeysArray[0]][$key] -> setParent($PUUID);
       }
   }
   /**
    * 获取套组列表首个Tag的父UUID
    * @return mixed|boolean
    */
   public function getWidgetArrayFristKey(){
       $tempKey = array_keys($this->widgetArray);
       if(!empty($tempKey)){
           return $tempKey[0];
       }else{
           return false;
       }
   }
   /**
    * 临时版（添加标签（））
    * @param string $id
    * @param Tag $widget
    */
   public function addWidgetArrayTag($id, $widget){
       
       $this->widgetArray[$id][] = $widget;
   }
   /**
    * 粘贴套件
    * @param string $toID
    * @param string $toPID
    * @param string $fromID
    * @param string $fromPid
    */
   public function pasteWidget($toID, $toPID, $fromID, $fromPid){
       $toWidget = self::tagIteration($this, $toPID, $toID, 'addWidgeCallback');
       $fromArray = self::tagIteration($this, $fromPID, $fromID, 'pasteTagCallback');
       if($fromArray['root'][0] instanceof Widget){
           $toWidget->addWidgetArray($toID, $fromArray['root'][0]);
           unset($fromArray['root']);
           $widgetArray = $fromArray;//$widget->getWidgetArray();
           foreach ($widgetArray as $key=>$value){
               $toWidget->addWidgetArray($key, $value);//[$key][] = $value;
           }
       }else {
           $toWidget->addWidgetArrayTag($toID,$fromArray['root'][0]);
           // var_dump($toWidget->getWidgetArray());
       } 
       return true;
   }
   //刷新部分套件
   public function refreshWidgetByID($id,$pid){
       $toWidget = self::tagIteration($this, $toPID, $toID, 'addWidgeCallback');
       return $toWidget->widgetToString($id);
   }
    
}

?>