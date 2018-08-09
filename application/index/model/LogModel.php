<?php
namespace app\index\model;

use think\Model;
class LogModel extends Model
{
    protected $table = "ce_log";
    //获取日志列表
    public function getLogList($where,$start,$length){
    
        return $this->where($where)->order('id desc')->page($start,$length)->select();
        
    }
    //获取日志列表的数量
    public function getLogListCount($where){
        return $this->where($where)->count();
    }
}

?>