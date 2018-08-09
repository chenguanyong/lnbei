<?php
namespace com\lnbei\file;
//遍历目录
class DirErgodic {
    
    private $path;//路径
    private $pathHeader;//目录句柄
    function __construct($path) {
        if(is_dir($path) ===false){
            throw new Exception();
        }
        $this->path = $path;
        $this->pathHeader = opendir($path);       
    }
    //遍历
   public static function ergodic($mu, $function , $obj,$obj1){
    
        if(is_file($mu)){
            $re =  $function($mu,$obj1);
            if($re){return true;}else{return false;}
        }else if(is_dir($mu)){
            $temp = scandir($mu, 1);
            if($temp ===false){return false;}
            $int_count = count($temp) - 2;
            while($int_count>0){
                $int_count--;
                $re =DirErgodic::ergodic($mu. '\\'.$temp[$int_count], $function , $obj,$obj1) ;
            }
            return true;
        }else{
            return false;
        }
         
    }//遍历目录
    public static function ergodics($mu ,$mubiao){
    //var_dump($mu);
        $mub = $mu.'/'.$mubiao;
        if(is_file($mub)){
            return array(1,$mub,$mu);
        }else if(is_dir($mu)){
            $temp = scandir($mu, 1);
            if($temp ===false){return false;}
            $int_count = count($temp) - 2;
            while($int_count>0){
                $int_count--;
                $re =DirErgodic::ergodics($mu. '\\'.$temp[$int_count],$mubiao) ;
                if($re[0]==1){
                    return $re;
                }
            }
            return false;
        }else{
            return false;
        }
    }

    //返回目录列表
    public static function getDirArray($path){
        
        $files = array();
        if(!is_dir($path)){
            throw new \Exception('目录格式不对');
            return null;
        }
        $dh = opendir($path);
        while (false !== ($filename = readdir($dh))) {
           if(!empty(trim($filename,".")))
            $files[] = $path . "\\" . $filename;
        }   
        return $files;
    }
    //输出当前目录
    public static function currentdir(){
        
        return getcwd();
    }
    //关闭句柄
    public function close(){
        
        closedir($this->pathHeader);
    }
    //改变目录
    public static function chdir($path){
        
        $r = chdir($path);
        if($r === false){
            
            return false;
        }
        return true;
    }
}

//function gg($o,$a){
    
 //   echo 'chen'.$o.'gg'.$a.PHP_EOL;
    
//}

//$path_header = new DirErgodic('G:\t\r\htdocsj');

//$path_header->ergodic('G:\t\r\htdocsj', 'gg', 'CHEN','1');



