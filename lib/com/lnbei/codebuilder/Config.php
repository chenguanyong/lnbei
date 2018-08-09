<?php
namespace com\lnbei\codebuilder;

class Config
{
    public static $dataArray=array(
        //数据库配置
        "db"=>array(
            "user"=>"root",
            "password"=>"1100",
            "host"=>"127.0.0.1",
            "dbname"=>"hh",
            "port"=>3306,
        ),
        "RootPath"=>ROOTPATH,//根目录
        "APPPath"=>"E:\\f\\phpace_dev\\application",//生成目录
        "Module"=>"test",//默认的模块名称
        "DefaultSuffix"=>"Model",//文件名默认后缀
        "StartPhpFlag" =>"<?PHP ",//PHP文件开始标志
        "EndPhpFlag" =>" ?>",//PHP文件结束标志
        "Extension" =>"php",//文件后缀
        "MvcFolder" =>"model",//文件选择器
        "ExtensionHtml"=>"html",//视图文件后缀
    );
    
    public static $configHome = array(
        //数据库配置
        "db"=>array(
            "user"=>"root",
            "password"=>"root",
            "host"=>"127.0.0.1",
            "dbname"=>"phpce",
            "port"=>3307,
        ),
        "RootPath"=>ROOTPATH,//根目录
        "APPPath"=>"G:/linbei/root/phpace_dev/application",//生成目录
        "Module"=>"Test",//默认的模块名称
        "DefaultSuffix"=>"Model",//文件名默认后缀
        "StartPhpFlag" =>"<?PHP ",//PHP文件开始标志
        "EndPhpFlag" =>" ?>",//PHP文件结束标志
        "Extension" =>"php",//文件后缀
        "MvcFolder" =>"model",//文件选择器
        "ExtensionHtml"=>"html",//视图文件后缀
    );
    
    
    
    
    /**
     * 构造函数
     */
    public static function configView(){
      //  Config::$dataArray = Config::$configHome;
        Config::$dataArray["View"] = array(
            "MainViewPath"=>Config::$dataArray["RootPath"] . "\\" . "view\\" . "template\\index.html",//主要视图HTML代码地址
            "MainViewJs"=>Config::$dataArray["RootPath"] . "\\" . "view\\" . "template\\dfajdf.js",  
            "LayoutPath"=>Config::$dataArray["RootPath"] . "\\" . "view\\" . "template\\layout\\widget.layout.xml", 
        );
        
    }

}

?>