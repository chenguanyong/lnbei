<?php
namespace com\lnbei\codebuilder\classs;
/**
 * 注释类
 * @author Administrator
 *
 */
class Notes implements ClassImp
{ 
    /**
     * 注释名称
     * @var unknown
     */
    public $name;
    /**
     * 注释类型
     * @var string
     */
    public $type;
    /**
     * 识别码
     * @var string
     */
    public $id;
    /**
     * 唯一所属识别码
     * @var string
     */
    public $pId;
    /**
     * 注释内容
     * @var string 
     */
    public $text;
    /**
     * 构造函数
     */
    public function __construct($id,$pid){
        $this->id = $id;
        $this->pId = $pid;
    }
    /**
     * 转换成字符串
     * {@inheritDoc}
     * @see \com\lnbei\codebuilder\classs\ClassImp::toString()
     */
    public function toString(){
        return $this->text  . PHP_EOL;;
    }
}

?>