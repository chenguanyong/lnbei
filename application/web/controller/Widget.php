<?php
namespace app\web\controller;

use think\Controller;
use app\web\model\WidgetModel;
class Widget extends Controller
{
    public function index(){
       return $this->fetch("index");
    }
    // for tree

    
}

?>