<?php
namespace com\lnbei\codebuilder\controller;

use com\lnbei\codebuilder\ClassAdapter;
use com\lnbei\codebuilder\classs\NameSpaces;
use com\lnbei\file\File;
use com\lnbei\codebuilder\Builder;
use com\lnbei\codebuilder\classs\Variable;
class CreateControllerImp extends Builder implements ControllerImp
{
    private $classAdapter;
    /**
     * 
     * @var NameSpaces
     */
    private $nameSpace;
    /**
     * 控制器数据
     * @var array
     */
    private $data;
    /**
     * 生成控制器
     */
    public function createController($className){
        
        $this->className = self::getClassName($className);
        $this->FullclassName = self::getFullClassName($className);
        $class = $this->nameSpace->classArray[0];
        var_dump($class);
        $tempVar = new Variable("","");
        $tempVar->name = "modelName";
        $tempVar->accessType="private";
        $tempVar->value =   $this->FullclassName . "Model";
        $class->attr[] = $tempVar;
        $class->name = $this->className . $this->defaultSuffix;
        $this->nameSpace->spaceArray[] = self::BuildModelNamespaceStr($this->className);
        
        $classHtml = $this->nameSpace->toString();
        //$html = File::fWriteCcontex($path, $classHtml);
        $clssPath = static::spellPath();
        $int = static::saveFile($clssPath, $classHtml);
        return $int > 0 ? true : false;
    }
    public function __construct($configData,$className){
        parent::__construct($className);
        $this->data = $configData;
        $this->classAdapter = new ClassAdapter($configData);
        $this->nameSpace = $this->classAdapter->getNameSpace();
        $this->mvcFolder = "controller";
        $this->defaultSuffix = "";
    }
    /**
     * 获取类的名称
     * @param unknown $className
     */
    public function getFullClassName($className){
        $tempArray = explode("_", $className);
        $strName = "";
        if(count($tempArray)>=2){
            for($i = 1;$i< count($tempArray);$i++){
                $strName .= $tempArray[$i];
            }
        }else{
            $strName = $className;
        }
       
        return "app\\" . $this->module . "\\" . "model" . "\\" . ucfirst($strName);  
    }
    public function getClassName($className){
        $tempArray = explode("_", $className);
        $strName = "";
        if(count($tempArray)>=2){
            for($i = 1;$i< count($tempArray);$i++){
                $strName .= $tempArray[$i];
            }
        }else{
            $strName = $className;
        }
        return ucfirst($strName);
    }
}

?>