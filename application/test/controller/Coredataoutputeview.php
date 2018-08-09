<?php
namespace app\test\controller;

use think\Controller;
class Coredataoutputeview extends Controller
{
    public function index(){
        
        
        return $this->fetch("./show");
    }
}

?>