<?php
namespace com\lnbei\html\core\view\page;
//页面类
use com\lnbei\html\core\view\View;
use com\lnbei\html\core\set\SetImp;
class PageView 
{
	private $width;//宽
	private $height;//高
	private $X;//x坐标
	private $Y;//y坐标
	private $Z;//z坐标
	private $list;
	protected $setImp;
	public function __construct(){
		$this->list = array();
		$this->setImp = new SetImp();
	}
	public function getHeight(){
		return $this->height;
	}
	public function getWidth(){
		return $this->width;
	}
	public function getX(){
		return $this->X;
	}
	public function getY(){
		return $this->Y;
	}
	public function getZ(){
		return $this->z;
	}
	public function setHeight($height){
		$this->height = $height;
	}
	public function setWidth($width){
		$this->width = $width;
	}
	public function setX($x){
		$this->X = $x;
	}
	public function setY($y){
		$this->Y = $y;
	}
	public function setZ($z){
		$this->z = $z;
	}
	//输出Html
	public function draw(){
		
	}
}

?>