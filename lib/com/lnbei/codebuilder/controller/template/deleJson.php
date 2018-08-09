<?php
return <<<'xml'
  if(request()->isAjax()){
     $model = $this->model;
     $id = input($this->pk);
     $result = $model ->dele($id);
     if($result == null){
         return json(array("code"=>0,"msg"=>"删除失败"));
     }else{
         return json(array("code"=>1,"msg"=>"删除成功"));
     } 
 }   
    
xml;
