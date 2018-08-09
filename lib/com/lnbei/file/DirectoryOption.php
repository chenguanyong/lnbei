<?php
namespace com\lnbei\file;

class DirectoryOption
{
    //添加新目录
    public static function mkdir($pathname){
        if(!is_dir($pathname)){
          return null;  
        }else{
            @mkdir($pathname);
        }
    }
    //删除目录
    public static function unlink($pathname){
        if(!is_dir($pathname)){
            return null;
        }else{
            unlink($pathname);
        }        
    }
}

?>