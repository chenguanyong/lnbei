<?php
namespace app\index\model;

use think\Model;
class ConfModel extends Model
{
    protected $table = "ce_config";
    
    //获取系统配置文件
    public function getconfig($where){
      return $this->where($where)->select();
    }
    //添加配置
    public function setConfig($data){
        $companyid = $data["CompanyID"];
        $City = $data["CityID"];
        $restult = $this->where(["CompanyID"=> $data["CompanyID"],"CityID"=>$data["CityID"],"Name"=>data["Nmae"]])->find();
        if($restult == null){
            return null;
        }
        return $this->save($data);
    }
    //更新配置
    public function updateConfig($data){
    // 启动事务
    $this->startTrans();
    try{
        foreach ($data as $value){
            
            $this->save(["Value"=>$value["value"]],["ID"=>$value["id"]]);
        }
        // 提交事务
        $this->commit();    
    } catch (\Exception $e) {
        // 回滚事务
        $this->rollback();
        return null;
    }
    return "ok";
    }
}

?>