<?php
namespace com\lnbei\codebuilder;

use com\lnbei\codebuilder\classs\NameSpaces;
use com\lnbei\codebuilder\classs\Classs;
use com\lnbei\codebuilder\classs\Fun;
use com\lnbei\file\File;
use com\lnbei\codebuilder\common\Tool;
use com\lnbei\codebuilder\common\PatternType;
use com\lnbei\codebuilder\classs\Variable;
class ClassAdapter
{
    /**
     * 类数据数组
     * @var unknown
     */
    private $classData;
    /**
     * 构造函数
     */
    public function __construct($data){
        $this->classData = $data;
    }
    /**
     * 获取文件中的内容
     * @param unknown $path
     */
    private function getConyentByFile($path){
        return require $path;
    }
    /**
     * 返回class对象
     */
    private function createNameSpaceClass(){
        if(empty($this->classData)){
           return null; 
        }
        //初始化命名空间类
        $nameSpace = new NameSpaces($id = "", $pid = "");
        $classs = new Classs($id = "", $pid = "");
        foreach ($this->classData['chilenTag'] as $key=>$value){
            $valueAttr = $value["attr"];
           // var_dump($valueAttr);
            if(empty($valueAttr["type"])){
                if(!empty($value["content"]) && $valueAttr["name"] == "FullNameSpace"){
                    if(empty($valueAttr["value"])){
                        $nameSpace->name="";
                    }else{
                        $nameSpace->name=Tool::strReplace(PatternType::MODULAR, Config::$dataArray['Module'], $valueAttr["value"]);
                    }
                   
                }elseif(!empty($value["content"]) && $valueAttr["name"] == "BaseName"){
                    if(empty($valueAttr["value"])){
                        $classs->parentClassName = "";
                    }else{
                        $classs->parentClassName=$valueAttr["value"];
                    }
                }elseif (!empty($value["content"]) && $valueAttr["name"] == "BaseNameSpace"){
                    if(empty($valueAttr["value"])){
                        $classs->parentClassNamespace = "";
                    }else{
                        $classs->parentClassNamespace=$valueAttr["value"];
                    }
                }elseif (!empty($value["content"]) && $valueAttr["name"] == "Use"){
                    if(!empty($valueAttr["value"])){
                        $nameSpace->spaceArray[] = $valueAttr["value"];
                    }
                }
                continue;
            }elseif($valueAttr["type"] == "fun"){
                $fun = new Fun($id = "", $pid = "");
                if(!empty($valueAttr["name"])){
                    $fun->funName = $valueAttr["name"];
                }else{
                    $fun->funName = "fun" . time();
                }
                if(!empty($valueAttr["accesstype"])){
                    $fun->accessType = $valueAttr["accesstype"];
                }else{
                    $fun->accessType = " public ";
                }  
              
                if(!empty($valueAttr["isstatic"])){
                    $fun->isStatic = $valueAttr["isstatic"];
                }else{
                    $fun->isStatic = " false ";
                }      
                if(!empty($valueAttr["param"])){
                    $fun->paramArray = explode(",",$valueAttr["param"]);
                }else{
                    $fun->paramArray = array();
                }
              
                if(!empty($valueAttr["value"])){
                    $html = require Config::$dataArray['RootPath'] . "\\" . $valueAttr["value"];
                    $fun->funBody = $html;
                }else{
                    $fun->paramArray = " ";
                }
               // var_dump($fun->toString());
                $classs->funArray[] = $fun;
                //var_dump($classs);
               // $jk = $classs->toString();
                //var_dump($jk);
                //exit;
                continue;
            }elseif($valueAttr["type"] == "variable"){
              $variable = new Variable($id = "", $pId = "");
              if(!empty($valueAttr["name"])){
                  $variable->name = $valueAttr["name"];
              }else{
                  $variable->name = "var" . time();
              }
              if(!empty($valueAttr["accesstype"])){
                  $variable->accessType = $valueAttr["accesstype"];
              }else{
                  $variable->accessType->accessType = " public ";
              }
              if(!empty($valueAttr["isstatic"])){
                  $variable->isStatic = $valueAttr["isstatic"];
              }else{
                  $variable->isStatic = " false ";
              }  
              if(!empty($valueAttr["value"])){
                  $variable->value = $valueAttr["value"];
              }else{
                  if(!empty($valueAttr["default"])){
                      $variable->value = $valueAttr["default"];
                  }else{
                      $variable->value = " ";
                  } 
              }
              $classs->attr[] = $variable;
              continue;
            }
        
        }
        $nameSpace->classArray[] = $classs;
        
        //var_dump($nameSpace->toString());
        //exit("sdfsf");
        return $nameSpace;
    }
    public function getNameSpace(){
        return self::createNameSpaceClass();
    }
    //获取文件内容
    public static function getFileContent($path){
        
        return File::fReadContex($path);
    }
}

?>