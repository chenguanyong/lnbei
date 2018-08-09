<?php
namespace com\lnbei\codebuilder\classs;
/**
 * 方法类
 * @author Administrator
 *
 */
class Fun implements ClassImp
{
    /**
     * 方法名称
     * @var string
     */
    public $funName;
    /**
     * 方法识别码
     * @var string
     */
    public $id;
    /**
     * 方法所属类识别码
     * @var string
     */
    public $pId;
    /**
     * 方法体
     */
    public $funBody;
    /**
     * 返回值类型
     * @var string
     */
    public $returnType;
    /**
     * 访问类型
     * @var string
     */
    public $accessType;
    /**
     * 参数列表
     * @var array
     */
    public $paramArray = array();
    /**
     * 注释
     * @var Notes
     */
    public $notes;
    /**
     * 是否静态
     * @var bool
     */
    public $isStatic;
    /**
     * 构造函数
     */
    public function __construct($id,$pid){
        $this->id = $id;
        $this->pId = $pid;
        $this->paramArray = array();
    }
    /**
     * 
     * {@inheritDoc}
     * @see \com\lnbei\codebuilder\classs\ClassImp::toString()
     */
    public function toString(){
        $str = "";
        if(!empty($this->notes)){
            $str .= $this->notes->toString();
        }
        $str .= $this->accessType;
        if(empty($this->isStatic)){
            $str .= " static ";
        }
        $str .= " function ";
        $str .= $this->funName;
        $tempParam = "";
        foreach ($this->paramArray as $key=>$value){
            $tempParam .= ", $" .$value;
        }
        $str .= "(" . trim($tempParam,",") . "){ "  . PHP_EOL;;
        $str .= $this->funBody  . PHP_EOL;;
        $str .= " }"  . PHP_EOL;;
        return $str;
    }
}

?>