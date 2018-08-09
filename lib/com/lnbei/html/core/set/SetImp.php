<?php
namespace com\lnbei\html\core\set;
use com\lnbei\html\core\set\Set;
use com\lnbei\html\core\view\ViewManage;
class SetImp implements Set
{
   protected $layoutAndWidgetArray;
   public function __construct(){
       $this->layoutAndWidgetArray = array();
   }
   public function addWidget($pid,ViewManage $viewManage){
       $this->layoutAndWidgetArray[$pid] = $viewManage;
   }
   public function DeleWiget($pid,$id){
      unset($this->layoutAndWidgetArray[$pid]); 
   }
   public function getLayoutAndWidgetArray(){
       return $this->layoutAndWidgetArray;
   }
   public function getViewManage($pid){
       return $this->layoutAndWidgetArray[$pid];
   }

}

?>