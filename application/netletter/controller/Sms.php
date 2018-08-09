<?php
namespace app\netletter\controller;

use app\common\controller\Base;
use app\netletter\model\MessageModel;
use app\netletter\model\TaskModel;
use app\netletter\model\WaringModel;
class Sms extends Base
{
    
    public function index(){
    /**
     * 				{
						task:{
							size:0,//鏁伴噺
							data:[]//鏁版嵁
							},
						waring:{
							size:0,//鏁伴噺
							data:[]
							}
						msg:{
							size:0,//鏁伴噺
							data:[]//鏁版嵁
						}
					}
     * 
     *
     ****/    
        $task = new TaskModel();//任务模型
        $msg = new MessageModel();
        $waring = new WaringModel();
        $data = array();
        $data["task"]=array("size"=>0,"data"=>[]);
        $data["waring"]=array("size"=>0,"data"=>[]);
        $data["msg"]=array("size"=>0,"data"=>[]);
        return json($data);
    }
}

?>