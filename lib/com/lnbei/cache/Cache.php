<?php
namespace com\lnbei\cache;

class Cache extends AbstractCache{
	public $filename;//文件名
	public $time;//当前时间
	public $outtime;//过期时间
	public $filehandle;//文件句柄
	protected  $flog;//打开标志
	private $type;
	/**
	*构造函数
	*@auhor cgy
	*@date 2016-10-2 上午12:33:17
	*@param string
	*@param int
	*@return void
	*
	*/
 function __construct($filename,$outtime=0){
 	$filename=__FILE__.$filename.time().rand(0, 10);
 	$this->time=time();
 	$this->outtime=$outtime;
 	$this->filename=$filename;
    $this->flog=  $this->filehandle=fopen($filename, 'wb+') ; 
    $this->type=new cahe_type();
    $f=fread($this->filehandle, filesize($filename));
	if(!empty($f)){
	   $this->type=unserialize($f);
	}
 }
 //判断是否打开文件；
 /**
 *
 *@auhor cgy
 *@date 2016-10-2 上午12:32:52
 *@param void 
 *@return bool
 *
 */
  function is_open(){
    return $this->flog;
  }
  /**
  *写入数据
  *@auhor cgy
  *@date 2016-10-2 上午12:40:17
  *@param string name
  *@param string value
  *@return bool
  *
  */
  function  cacheWrite($name,$value){
	//$data=fread($this->filehandle,filesize($this->filename));
	//$type=unserialize($data);
	$type->$name=$value;
  }
  /**
  *读取缓存值
  *@auhor cgy
  *@date 2016-10-2 上午12:48:18
  *@param string
  *@return string
  *
  */
	function cacheRead($name){
    	$data= $this->type->$name;
    	if(empty($data)){
    	   return false;
    	}else{
    	   return $data;
    	}
	}
	/**
	*析构函数
	*@auhor cgy
	*@date 2016-10-2 上午12:56:36
	*@param string
	*@return string
	*
	*/
	function __destruct(){
    	$data=serialize($this->type);
    	fwrite($this->filehandle, $data);
    	fclose($this->filehandle);
	}
}
