<?php
namespace app\web\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {  
        return $this->fetch('design'); //$password;
    }
}
