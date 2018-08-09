<?php
namespace app\widow\controller;
use app\common\controller\Base;
class Filewindow extends Base
{
    public function index(){
        return $this->fetch("index");
    }
}

?>