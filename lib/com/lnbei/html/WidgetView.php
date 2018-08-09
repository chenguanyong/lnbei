<?php
namespace com\lnbei\html;

use com\lnbei\html\core\view\View;
use com\lnbei\html\widget\Widget;

class WidgetView extends Widget implements View
{
    private $parentHight;
    private $parentWidth;
    private $X;//x坐标
    private $Y;//y坐标
    private $Z;//z坐标
    private $list;
    public function __construct($tagManage,$tagCssManage,$tagAttrManage,$path,$bool=false){
    	parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $path, $bool);
        $this->list = array();
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
    public function setX($x){
    	 $this->X = $x;
    }
    public function setY($y){
    	 $this->Y = $y;
    }
    public function setZ($z){
    	 $this->z = $z;
    }
    //获取屏幕宽
    public function getParentWidth(){
        return $this->parentWidth;
    }
    //获取屏幕高
    public function getParentHeight(){
        return $this->parentHight;
    }
    //输出Html
    public function draw(){
    	return parent::widgetToString();
    }
}

?>