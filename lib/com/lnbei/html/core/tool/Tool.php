<?php
namespace com\lnbei\html\core\tool;
//|---------------------------|
//|-------工具函数  ------------|
use com\lnbei\html\core\config\Config;
class Tool
{
    /**
     * 随机数
     * 1000-9999
     */
    public static function random(){
        return \uniqid().rand(1000,9999);
    }
    /**
     * 加载类
     * @param unknown $namespace
     * @param unknown $class
     * @throws \Exception
     */
    public static function loader($namespace,$class){
        $classPath = Config::$confArray['TOOLDIR']."/" . $namespace . "/".$class.".php";
        if(is_file($classPath)){
            require_once $classPath;
        }else{
            throw new \Exception();
        }
    }
    /**
     * 添加标签
     * @param unknown $xml
     * @return mixed
     */
    public static function addTag($xml){
        $pattern = '/\>(.*?)\<([^\/])/i';
        $replacement = '><lbtag>$1</lbtag><$2';
        return preg_replace($pattern, $replacement, $xml);
    }
    /**
     * 整理格式
     * @return mixed
     */
    public static function checkFormat($xml){
        $pattern = '/([A-Z,a-z,0-9]*?)=([^",.]*?) /i';
        $replacement = ' $1="$2" ';
        return preg_replace($pattern, $replacement, $xml);
    }
    /**
     * 添加空格
     * @param unknown $xml
     * @return mixed
     */
    public static function addSpace($xml){
        $pattern = '/<([^?,^\/,.]*?)>/i';
        $replacement = '<$1 >';
        return preg_replace($pattern, $replacement, $xml);
    }
    /**
     * 检查xmlgeshi
     * @param unknown $xml
     */
    public static function inspectXml($xml){
        
        //$xml = Tool::addSpace($xml);
        //$xml = Tool::checkFormat($xml);
        //$xml = Tool::addTag($xml);
        return $xml;
    }
    /**
     * 调试工具--输出Html字符串
     * @param unknown $s
     */
    public static function textArea($str){
        if(DEBUG){
            echo "<textarea>".$str."</textarea>";
        }
    }
    /**
     * 调试工具--输出
     * @param string $strArray
     */
    public static function debugEcho($strArray){
        if(DEBUG){
            foreach($strArray as $value){
                var_dump($value);
            }
        }
    }
    /**
     * 调试工具--打印数组
     * @param array $array
     */
    public static function debugVarDump($array){
        if(DEBUG){
            foreach($array as $value){
                var_dump($value);
            }
        }
    }
    /**
     * 调试工具--输出数组 
     * @param array $array
     */
    public static function debugPrintR($array){
        if(DEBUG){
            foreach($array as $value){
                print_r($value);
            }
        }        
    }
}

?>