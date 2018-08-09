<?php
namespace com\lnbei;
class ErrorException extends Exception
{   
	public $err_obj1;
	public $mas;
	public function __construct($mas,$err_obj){
		parent::__construct($mas);
		$this->err_obj1=$err_obj;
		$this->mas=$mas;
		
	}
	
	
	
}