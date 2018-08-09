<?php
namespace com\lnbei\codebuilder\classs;

class NameSpaces implements ClassImp
{

    /**
     * 名称
     * @var string
     */
    public $name;//
    /**
     * 命名空间全称
     * @var string
     */
    public $fullName;//
    /**
     * 属性名包括方法
     * @var array
     */
    public $globalVariable = array();
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
     * 注释
     * @var Notes
     */
    public $notes;
    /**
     * 方法集合
     * @var array
     */
    public $funArray = array();
    /**
     * 所属类集合
     * @var unknown
     */
    public $classArray = array(); 
    /**
     * 所使用的包名
     * @var array
     */
    public $spaceArray = array();
    /**
     * 构造函数
     * @param string $id
     * @param string $pid
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
        $str .= "Namespace " . $this->name . ";" . PHP_EOL;
        $strUse = "";
        $strClass = "";
        foreach ($this->classArray as $key=>$value){
          
            if(!empty($value->parentClassNamespace)){
                $strUse .= "use " . $value->parentClassNamespace . ";" . PHP_EOL;
            }
            if(!empty($value->interfaceNamespace)){
                $strUse .= "use " . $value->interfaceNamespace . ";" . PHP_EOL;
            }
        }
        foreach ($this->spaceArray as $value){
            
            if(!empty($value)){
                $strUse .= "use " . $value . ";" . PHP_EOL;
            }
        }
        foreach ($this->classArray as $key=>$value){
        
            $strClass .= $value->toString() . PHP_EOL;
        }
        $str .= $strUse . PHP_EOL;
        $str .= $strClass . PHP_EOL;
        $strVariable = "";
        foreach ($this->globalVariable as $key=>$value){
            $strVariable .= $value->toString() . PHP_EOL;
        }
        $str .= $strVariable . PHP_EOL;
        $strFun = "";
        //处理全局函数
        foreach ($this->funArray as $key=>$value){
            $strFun .= $value->toString() . PHP_EOL;
        }
        $str .= $strFun . PHP_EOL;
        return $str;
    }
}

?>