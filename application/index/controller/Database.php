<?php
namespace app\index\controller;


use think\Controller;
use think\Request;
use think\Db;
class Database extends Controller
{
    public function index(){
        
        return $this->fetch("index");
    }
    
    public function getDatabase(){
        
        if(Request::instance()->isAjax()){
       
           //初始化请求
           $request = Request::instance();
           //获取请求参数
           $query_data = $request->param();
           $result = Db::query("SHOW TABLE STATUS");
           $data = array();           
           foreach ($result as $key =>$value){
               $data[$key]["ID"]=$key;
               $data[$key]["Name"]=$value["Name"];
               $data[$key]["Engine"]=$value["Engine"];
               $data[$key]["Rows"]=$value["Rows"];
               $data[$key]["Create_time"]=$value["Create_time"];
               $data[$key]["Update_time"]=$value["Update_time"];
               $data[$key]["Data_length"]=$value["Data_length"];
           }
           if($data == null){
           
               return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0],JSON_UNESCAPED_UNICODE);
           }
           return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>1,'recordsFiltered'=>1,'data'=>$data],JSON_UNESCAPED_UNICODE);
        }
        
    }
}

?>