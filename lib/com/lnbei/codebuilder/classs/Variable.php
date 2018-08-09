<?php
namespace com\lnbei\codebuilder\classs;
/**
 * 变量类型
 * @author Administrator
 *
 */
class Variable implements ClassImp
{
    /**
     * 字段名称
     * @var string
     */
    public $name;
    /**
     * 访问类型
     * @var string
     */
    public $accessType;
    /**
     * 是否静态
     * @var bool
     */
    public $isStatic;
    /**
     * 数据类型
     * @var string
     */
    public $dataType;
    /**
     * 默认值
     * @var string
     */
    public $default;
    /**
     * 字段值
     * @var string
     */
    public $value;
    /**
     * 唯一识别码
     * @var string
     */
    public $id;
    /**
     * 唯一所属识别码
     * @var string
     */
    public $pId;
    /**
     * 唯一所属识别码类型：类如是函数还是类
     * @var int
     */
    public $pType;
    /**
     * 注释
     * @var Notes
     */
    public $notes;
    /**
     * 构造函数
     */
    public function __construct($id,$pId){
        $this->pId = $pId;//设置唯一所属识别码
        $this->id = $id;//设置识别码
    }
    public function toString(){
        $str = " ";
        if(!empty($this->notes)){
            $str .= $this->notes->text. " ";
        }
        $str .= $this->accessType . " ";
        if(trim($this->isStatic) == "true"){
            $str .= " static ";
        }
        $str .= "$" . $this->name;
        if(empty($this->value)){
            $str .= empty($this->default)? "":" = \"" . $this->default . "\"";
        }else{
            $str .= " = \"" . $this->value . "\"";
        }
        $str .= " ;"  . PHP_EOL;
        return $str;
    }
}

?>