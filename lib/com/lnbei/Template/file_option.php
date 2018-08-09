<?php
namespace com\lnbei\Template;
class file_option{
    private $file;
    private $path;
    public function __construct($path){

        $this->path = $path;
        if(is_file($path)){
            $this->file = fopen($this->path, 'ab+');
        }else{

            throw new Exception();
        }
    }
    //读文件
    public  function read(){
        $txt = "";

        if($this->file === false){throw  new Exception();}
        $txt = fread($this->file, filesize($this->path));
        if($txt === false) {throw new Exception();}


        return $txt;
    }
    //写文件
    public  function write($string){
        $handle =  $this->file;

        ftruncate($handle,0);
        $int_count = fwrite( $handle, $string);
        if($int_count === false){
            throw new Exception();
        }

        return $int_count;
    }
    //关闭文件句柄
    public  function close(){

        fclose($this->file);

    }
}