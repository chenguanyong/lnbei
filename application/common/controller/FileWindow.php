<?php
namespace app\widow\controller;

class Filewindow extends Base
{
    public function index(){
        return $this->fetch("index");
    }
}

?>