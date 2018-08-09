<?php
namespace app\netletter\model;

use think\Model;
class MessageModel extends Model
{
    protected $table="ce_messageinfo";
    
    //获取信息列表
    public function getWaringNewsList($where,$start,$num){
    
        return $this->join("ce_messagegroup","ON ce_messageinfo.msggroupID = ce_messagegroup.MessageGroupID")->where($where)->page($start,$num)->order("ID desc")->select();
    }
    //获取信息列表的数量
    public function getWaringNewsCount($where){
        return $this->join("ce_messagegroup","ON ce_messageinfo.msggroupID = ce_messagegroup.MessageGroupID")->where($where)->count();
    }
    //添加信息
    public function addWaringNews($data){
        return $this->save($data);
    }
    //删除信息
    public function deleWaringNews($id){
        return $this->save(["IsDelete"=>1],["ID"=>$id]);
    }
    //更新信息
    public function updateWaringNews($data,$id){
        return $this->save($data,["ID"=>$id]);
    }
}

?>