<?php
namespace com\lnbei\html\core\config;
/**
 * 初始化套件数据
 */
use com\lnbei\xml\XMLIteratorCallback;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\rule\Rule;
class WidgetInitXmlIterationCallback implements XMLIteratorCallback
{   
    /**
     * type TagManage
     * @var $tagManage
     */
    private $tagManage;
    /**
     * 套件内的标签对象集合
     * type array
     * @var tagWidget
     */
    private $tagWidget;
    /**
     * 标签css属性管理器
     * @var type TagCssManage
     */
    private $tagCssManage;//Css属性管理器
    /**
     * 标签属性管理器
     * @var unknown
     */
    private $tagAttrManage;
    /**
     * 关键字
     * @var array
     */
    private $systemRuleArray;
    private static $context=0;
    /**
     * 根标签属性
     * @var unknown
     */
    private $widgetAttr;
    /**
     * 获取根标签名
     * @var string
     */
    public $fristTag;
    /**
     * 规则对象
     * @var unknown
     */
    private $rule;
    /**
     * 
     * @param TagManage $tagManage
     * @param TagCssManage $tagCssManage
     * @param TagAttrManage $tagAttrManage
     */
    public function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage,Rule $rule){
        $this->tagManage = $tagManage;
        $this->tagWidget = array();
        $this->tagCssManage = $tagCssManage;
        $this->tagAttrManage = $tagAttrManage;
        $this->rule = $rule;
    }
    private function loader($tag){
       $tag = ucfirst($tag);
       $classPath = __DIR__."/../../tag/".$tag.".php";
      
//        spl_autoload_register(function ($tag) {
//            require_once  __DIR__."/../../tag/".$tag.".php";;
//        });
       if(is_file($classPath)){
          require_once $classPath;
          //use "com\\lnbei\\html\\tag\\".$tag;
       }else{
           throw new \Exception();
       }
      
    }
    /**
     *返回
     * @return NULL|unknown
     */
    public function getTagManage(){
        return $this->tagManage;
    }
    /**
     * 根标签属性
     */
    public function getWidgetAttr(){
        return $this->widgetAttr;
    }
    /**
     * 
     * @param TagManage $mTagManage
     */
    public function setTagManage($mTagManage){
        $this->tagManage = $mTagManage;
    }
    /**
     * 
     */
    public function getTagWidget(){
        return $this->tagWidget;
    }
    /**
     * 
     * @param TagManage $tagManage
     */
    public function setTagWidget($tagManage){
        $this->tagManage = $tagManage;
    }
    /**
     * 
     */
    public function getTagAttrManage(){
        return $this->tagAttrManage;
    }
    /**
     * 
     * @param TagAttrManage $tagAttrManage
     */
    public function setTagAttrManage($tagAttrManage){
        $this->tagAttrManage = $tagAttrManage;
    }
    /**
     * @param SimpleXMLElement $xmlObj
     * @param array $IDArray
     * {@inheritDoc}
     * @see \com\lnbei\xml\XMLIteratorCallback::call()
     */
    public function call($xmlObj, $IDArray){
        $tag = $xmlObj->getName();//标签的名称
        /*
         * 获取标签管理器
         */
        $tagArray = $this->tagManage->getTagArray();
        $r = array();
        preg_match('/[a-z,A-Z]{1,10}/',$tag,$r);
        $tag1 = $r[0];
        if(empty($tagArray[$tag1])){
            throw new \Exception($tag);
        }
        self::loader($tag1);//装载相关的类
        $id = $IDArray['id'];
        $pid = $IDArray['pid'];
        $xid = $IDArray['xid'];
        $xpid = $IDArray['xpid'];

        $tempAttr = array();
        $tempSystemKeyword = array();//系统属性
        $tempCssStr = "";//临时样式字符串
        foreach ($xmlObj->attributes() as $key=>$v){
            $subKey = substr(trim($key), 0,2);
            if(strtolower($subKey) == "lb"){
                $tempSystemKeyword[$key] = empty($v)? "":(String)$v;
            }else{
                $tempAttr[$key]=(String)$v;
            }
            if(strtolower(trim($key)) == "style"){
                $tempCssStr = (String)$v;
            }
        }
        $cssArray = array();
        if(!empty($tempCssStr)){
            $tempCssArrays = explode(";",$tempCssStr);
            foreach ($tempCssArrays as $key=>$Value){
                if(!empty($Value)){
                   $css = explode(":", $Value);
                   if(count($css) == 2){
                         $cssArray[$css[0]]=$css[1];
                   }
                }
            }
        }
//         $tempSystemKeyword['LBid'] = $id;
//         $tempSystemKeyword['pid'] = $pid;
        $this->systemRuleArray[$pid][$id] = $tempSystemKeyword;
        $content = trim((String)$xmlObj);
       /*
        * 实例化标签属性类
        */
        $tagAttrObj = new TagAttribute($tempAttr, $tag, $this->tagAttrManage);
        /*
         * 实例化标签样式类
         */
        $tagCssObj = new TagCss($cssArray,$tag , $this->tagCssManage);
        $tempTag = ['attr'=>$tempAttr,'id'=>$id,'pid'=>$pid,"content"=>$content,"xid"=>$xid,"xpid"=>$xpid,"rule"=>$this->rule];
        //if(self::$context == 0){
        //    $this->widgetAttr = $tempTag;
        //    self::$context++;
        //}else{
        $tag1 = ucfirst($tag1);
        $temp = new $tag1($tagAttrObj,$tagCssObj,$tempTag);
        $temp->setTagName($tag);
        $this->tagWidget[$pid][] = $temp;// new $tag1($tagAttrObj,$tagCssObj,$tempTag);
        //}
    }
    /**
     * 析构函数
     */
    public function __destruct(){
        $this->tagCssManage = null;
        $this->tagManage = null;
        $this->tagWidget=null;
        $this->tagAttrManage = null;
    }
    /**
     * 获取系统关键字数组
     */
    public function getSystemRuleArray(){
        return $this->systemRuleArray;
    }
    //设置根标签属性
    public function setFristTag($data){
        $this->widgetAttr = $data['attr'];
        $this->fristTag = $data['tag'];
    }
}

?>