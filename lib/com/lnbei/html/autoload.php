<?php
use com\lnbei\file\DirErgodic;
spl_autoload_register(function ($class) {
   $file = DirErgodic::ergodics(__DIR__, $class.".php");
   if(!empty($file)){
       foreach ($file as $key=>$value){
           if(is_file($value)){
               require_once $value;
           }
       }   
   }
});