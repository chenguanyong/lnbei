<?php
namespace app\index\controller;

use app\common\controller\Base;
use app\index\model\ConfModel;
use think\Session;
class Sysconf extends Base
{
    public function index(){
        return $this->fetch("index");
    }
    public function saveConf(){
        $confData = input("post.");
        $conf = new ConfModel();
        $result = $conf->updateConfig($confData);
        if($result == null){
            return json(array("code"=>0,"msg"=>"保存失败"));
        }else{
            return json(array("code"=>1,"msg"=>"保存成功"));
        }
    }
    //获取系统配置数据(ajax)
    public function getConfigAjax(){
        if(request()->isAjax()){
            $conf = new ConfModel();
            $id = input("post.id"); 
            if($id == null){
                $id= 0;//默认是系统设置
            }
            $where = array();
            $where["State"] = 0;
            $where["CompanyID"] = Session::get("companyID");
            $where["CityID"] = Session::get("CityID");
           // var_dump($where);
            $result = $conf->getconfig($where);
            $backResultPid = array();
            $backResult = array();
            foreach ($result as $value){
                if($value["PID"] == 0){
                    $backResultPid[] = $value;
                }else{
                    $backResult[] = $value;
                }
            }
            if($result == null){
                return json(["code"=>0,"msg"=>"失败","data"=>[]]);   
            }else{
                return json(["code"=>1,"msg"=>"成功","data"=>["PID"=>$backResultPid,"list"=>$backResult]]);
            }            
        }
    }
}

?>