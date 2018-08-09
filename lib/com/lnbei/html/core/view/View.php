<?php
namespace com\lnbei\html\core\view;

interface View
{
    //获取屏幕宽
   public function getParentWidth();
   //获取屏幕高
   public function getParentHeight();
   //绘画
   public function draw();
   //获取对象的X
   public function getX();
   //获取对象的Y
   public function getY();
   //获取对象的Z
   public function getZ();
}

?>