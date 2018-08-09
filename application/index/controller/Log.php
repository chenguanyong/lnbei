<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\LogModel;
class Log extends Controller
{
    public function index(){
       return $this->fetch();
    }
    //获取日志列表
    public function getLogList(){
        //初始化请求
        $request = Request::instance();
        //获取请求参数
        $query_data = $request->param();
        
        $log = new LogModel();
        $count = $log->getLogListCount(["CompanyID"=>"0","CityID"=>"0","IsDelete"=>0]);
        $user_array = $log->getLogList(["CompanyID"=>"0","CityID"=>"0","IsDelete"=>0],$query_data['iDisplayStart'],$query_data['iDisplayLength']);
        if($user_array == null){
        
            return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0],JSON_UNESCAPED_UNICODE);
        }
        return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>$count,'recordsFiltered'=>$count,'data'=>$user_array],JSON_UNESCAPED_UNICODE);        
        
    }
}

?>