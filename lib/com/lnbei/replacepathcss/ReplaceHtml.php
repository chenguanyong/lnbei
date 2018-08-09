<?php
namespace com\lnbei\replacepathcss;
class ReplaceHtml {
    const  HEADER = "/<header>[.\s\S]*?<\\/header>/i";
    const  FOOTER = "/<footer>[.\s\S]*?<\\/footer>/i";
    private  $file;
    private  $mainPath;//主目录
    private  $targetPath;//次目录
    private  $mb_content;

    public function __construct($mainPath, $targetPath) {
        
        if(is_file($mainPath) ===false || is_file($targetPath)===false){
            //如果不是可用的文件抛出异常
            throw  new Exception();
        }
        $this->targetPath = $targetPath;
        $this->mainPath = $mainPath;
        $this->file =@fopen($this->mainPath, 'rb+');
        if($this ->file === false){throw  new Exception();}
        $this->mb_content =$this -> read($this->mainPath);
        
    }
    //读文件
    private function read($targetPath){
        $txt = "";
        $file = fopen($targetPath, 'rb');
        if($file ===false){throw  new Exception();}
        $txt = fread($file, filesize($targetPath));
        if($txt === false) {throw new Exception();}
        fclose($file);  
        return $txt;  
    }
    //写文件
    private function write($string){
       $handle =  $this->file;
       ftruncate($handle,0);
       $int_count = fwrite( $handle, $string);
       if($int_count === false){
           throw new Exception();
       }
       return $int_count;
    }
    //关闭文件句柄
    public function close(){
        fclose($this->file);
    }
    public function replaceHeader(){
        $re = $this->replace(self::HEADER) ;
        if($re ===false){
            return false;
        }else{return true;}   
    }
    public function replaceFooter(){
        
        $re = $this->replace(self::FOOTER) ;
        if($re ===false){
         return false;
        }else{return true;}
        
    }
    private function replace($str){
        $txt_m = "";
        try{
            $txt_m = self::read($this->targetPath);
        }catch (Exception $r){
            return false;
        }
        $txt_m =trim($txt_m);
        $new_str = preg_replace($str, $txt_m, $this->mb_content);
        if($new_str === false){
            return false;
        }
        try{
            $this->write($new_str);
        }catch (Exception $t){
            return false;
        }
        return true;
    }
    //替换
    public function replaceTXT($paten){
        
        $paten = trim($paten);
        $txt = "/<".$paten.">"."[.\s\S]*?"."<\\/".$paten.">/i";
        
        $re = $this->replace($txt);
        if($re ===false ){
            
            return false;
        }else{return true;
        }
                
    }
    //设置目标路径
    public function setTargetPath($strpath){
        if(is_file($strpath) ===false ){
            return false;
        }else{
            $this->targetPath = $strpath;
        }
    }
    //设置主标路径
    public function setMainPath($strpath){
    
        if(is_file($strpath) ===false ){
    
            return false;
        }else{
    
            $this->mainPath = $strpath;
        }
    }
    
}

$f = new ReplaceHtml("G:\\t\\r\\htdocsj\\tt\\s\jj\\home\home.html", "G:\\t\\r\\htdocsj\\tt\\s\jj\\html\ll\muban.html");

$f->replaceHeader();
$f->close();

