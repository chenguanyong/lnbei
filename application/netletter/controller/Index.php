<?php
namespace app\netletter\controller;
use think\Controller;



class Index extends Controller
{
    public function index()
    {  


        return $this->fetch('index'); //$password;
    }

}
