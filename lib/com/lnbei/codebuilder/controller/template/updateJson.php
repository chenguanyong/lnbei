<?php
return <<<'xml'
   if(request()->isAjax()){
     $model = $this->model;
     $data = input("post.");
     $datas = array();
     foreach ($data as $key=>$value){
         
         if($value!=""){
             $datas[$key]=$value;
         }
     }
     $result = $model ->update($datas);
      if($result == null){
          return json(array("code"=>0,"msg"=>"修改失败"));
      }else{
          return json(array("code"=>1,"msg"=>"修改成功"));
      } 
 }      
xml;
