<?php
namespace com\lnbei\html;

use com\lnbei\html\core\view\View;
use com\lnbei\html\core\layout\Layout;
class LayoutView extends Layout implements View
{    
	private $parentWidth;//宽
	private $parentHeight;//高
	private $X;//x坐标
	private $Y;//y坐标
	private $Z;//z坐标
	private $list;
	public function __construct($tagManage,$tagCssManage,$tagAttrManage,$path,$bool=false){
		parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $path, $bool);
	    $this->list = array();
	}
	public function getParentHeight(){
		return $this->parentWidth;
	}
	public function getParentWidth(){
		return $this->parentHeight;
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
	public function setParentHeight($height){
		$this->parentHeight = $height;
	}
	public function setParentWidth($width){
		$this->parentHeight = $width;
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
		return parent::widgetToString();
	}
}

?>