<?php
/**
每5分钟保存一次
2016 -12- 7 9:57
*/
namespace com\lnbei;
class ArticleOption{
	
	private $mysql;//mysql数据库句柄
	private $dbname = 'linbei_work';//数据库名称
	private $fileId;//文件ID
	private $type;//文件类型
	
    	public function __construct(){

    	    $this->mysql = new mysqli_($this ->dbname);
    	}
		
    	public function setfileid($id){
    		
    	    $this->fileId = $id;
    	}
    	public function getfileid(){
    		
    	    return $this->fileId;
    	}
    	//设置类型
    	public function settype($type){
    		
    		$this->type = $type;
    	}
    	//获取类型
    	public function gettype(){
    		
    		$this->type;
    	}
		//保存文章
    	public function save_update($title, $txt){
    		$sql = 'insert into tempfile (fileID, title, type, data, time) values ('.$this->fileId.' , \' ' . $title . '\' ,' .$this->type . ', \''.$txt.'\',' . time() . ' )';
    		$result = $this->mysql->insert0($sql);
    		return $result;
    	}
    	//恢复文章
    	public function recovery(){
    		
    		$sql = 'select title, data from tempfile where fileID = ' . $this->fileId . ' and type = ' . $this->type  ;
    		$result = $this->mysql -> read($sql);
    		if($result == false){
    			throw  new Exception('数据库读取错误', ' ', ' ');
    		}
    		return $this->mysql->search();
    	}
    	//关闭数据库
    	public function close(){
    		
    		$this ->mysql->mysql_c();
    		
    	}

	}



?>