<?php
return <<<'xml'
   if(request()->isAjax()){
     $model = $this->model;
    $data = input("post.");
    if(isset($data[$this->pk])){
        unset($data[$this->pk]);
    }
    //var_dump($data);
    //exit;
    $result = $model ->add($data);
    if($result == null){
        return json(array("code"=>0,"msg"=>"添加失败"));
    }else{
        return json(array("code"=>1,"msg"=>"添加成功"));
    } 
 }    
xml;
