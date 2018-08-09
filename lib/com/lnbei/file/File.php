<?php
namespace com\lnbei\file;
class File {
	public $filepath;//�ļ���ַ
	public $file_mulu;//�ļ�Ŀ¼
	protected  $hand_file;
	public $last_open_time;
	public $file_size;
	public $file_type;
	public $file_fix_time;
	public $mo;
    public 	function __construct($filename,$mode) {
    	$this->filepath=$filename;
    	$this->file_mulu=dirname($filename);
    	$this->mo=$mode;
    	$this->init();
    }
    public function f_open(){
    	if(is_file($this->filepath)){
    		if(is_readable($this->filepath)){
    			$this->hand_file=fopen($this->filepath, $this->mo);
    			return true;
    		}else 
    			return false;
    	}else return false;
    }
/*
 * ��ʼ���ļ�
 */
     private function init(){
     	$this->last_open_time=fileatime($this->filepath);
     	$this->file_size=filesize($this->filepath);
     	$this->file_type=filetype($this->filepath);
     	$this->file_fix_time=filemtime($this->filepath);
     }
 /*
  * ��д�ļ�
  */
    public function write_file($string){
        for ($written = 0; $written < strlen($string); $written += $fwrite) {
        	$fwrite = fwrite($this->hand_file, substr($string, $written));
        	if ($fwrite === false) {
        		return $written;
        	}
        }
        return $written;
    }
    public function read_file(){
        return $contents = fread($this->hand_file, filesize($this->filepath));
    }
    public function f_close(){
        fclose($this->hand_file);
    }
    public function flush(){
        return  fflush($this->hand_file);
    }
    public function error_code(){}

    public static function fWriteCcontex($filepath,$str,$separator="\\"){
    	
	    $pathArray = explode($separator, $filepath);
	    $tempDir = "";
        for($i=0;$i<count($pathArray)-1;$i++){
            $tempDir .= $separator . $pathArray[$i];
            $tempDir = trim($tempDir, $separator);
            if(!is_dir($tempDir)){
                @mkdir($tempDir);
            }
        }
        $f=file_put_contents($filepath, $str, FILE_APPEND | LOCK_EX);
    	if($f===false){
    		return false;
    	}else{ 
    		return true;
    	}
    }
    public static function fReadContex($filepath){
    	return file_get_contents($filepath, FILE_USE_INCLUDE_PATH);
    }
}


/*
$req=new file_opt("f.txt","ab+");
echo $req->file_size."\n";
echo $req->file_mulu."\n";
echo $req->file_type."\n";
echo $req->file_fix_time."\n";
echo $req->last_open_time."\n";

echo  $req->f_open();
//echo $req->write_file("wosdisjosdj");
//echo $req->flush();
echo $req->read_file();

echo $req->f_close();*/


