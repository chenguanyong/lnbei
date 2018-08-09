<?php
namespace com\lnbei\codebuilder\classs;

class Classs implements ClassImp
{
    /**
     * 类的类型(抽象类，接口，匿名类)
     * @var string
     */
    public $classType = "class";
    /**
     * 名称
     * @var string
     */
    public $name = "";//
    /**
     * 属性名包括方法
     * @var array
     */
    public $attr = array();
    /**
     * 类的命名空间
     * @var string
     */
    public $nameSpace;
    /**
     * 继承的类
     * @var string
     */
    public $parentClassName;
    
    /**
     * 父类的名称空间
     * @var string
     */
    public $parentClassNamespace;
    /**
     * 接口类名
     * @var string
     */
    public $interfaceName;
    /**
     * 接口类名称空间
     * @var string
     */
    public $interfaceNamespace;
    /**
     * 类的识别码
     * @var string
     */
    public $id;
    /**
     * 类的所属识别码
     * @var string
     */
    public $pId;
    /**
     * 是否静态
     * @var bool
     */
    public $isStatic = false;
    /**
     * 访问类型
     * @var string
     */
    public $accessType = "";
    /**
     * 注释
     * @var Notes
     */
    public $notes;   
    /**
     * 方法集合
     * @var array
     */
    public $funArray;
    /**
     * 构造函数
     * @param unknown $id
     * @param unknown $pid
     */
    public function __construct($id,$pid){
        $this->pId = $pid;
        $this->id = $id;
    }
    public function toString(){
        $str = "";
        if(!empty($this->notes)){
            $str .= $this->notes->toString();
        }
        $str .= $this->accessType;
        if($this->isStatic){
            $str .= " static ";
        }
        $str .= " " . $this->classType;
        $str .= " " . ucfirst($this->name) . " ";
        if(!empty($this->parentClassName)){
            $str .= " extends " . $this->parentClassName;
        }
        if(!empty($this->interfaceName)){
            $str .= " implements " . $this->interfaceName;
        }
        $str .= " { " . PHP_EOL;;
        $tempAttr = "";
        foreach ($this->attr as $key=>$value){
            $tempAttr .= $value->toString() . PHP_EOL;;
        }
        $str .= $tempAttr . PHP_EOL;;
        $tempFun = "";
        foreach ($this->funArray as $key=>$value){
            $tempFun .= $value->toString() . PHP_EOL;;
        }
        $str .= $tempFun  . PHP_EOL;;
        $str .= " } "  . PHP_EOL;
        return $str;
    }
}

?>