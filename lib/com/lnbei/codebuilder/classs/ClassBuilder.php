<?php
namespace com\lnbei\codebuilder\classs;
/**
 * 类类型
 * @author Administrator
 *
 */

class ClassBuilder implements ClassImp
{
    /**
     * 类的类型(抽象类，接口，匿名类)
     * @var int
     */
    private $classType;
    //名称(类名，接口名，抽象类名)
    private $name;//
    /**
     * 属性名包括方法
     * @var array
     */
    private $attr;
    /**
     * 类的命名空间
     * @var string
     */
    private $nameSpace;
    /**
     * 继承的类
     * @var unknown
     */
    private $parentClassName;
    
    /**
     * 父类的名称空间
     * @var string
     */
    private $parentClassNamespace;
    /**
     * 接口类名
     * @var string
     */
    private $interfaceName;
    /**
     * 接口类名称空间
     * @var string
     */
    private $interfaceNamespace;
    public function __construct(){
        
    }
    public function toString(){
        
    }
}

?>