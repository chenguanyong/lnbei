<?php
namespace app\netletter\model;

use think\Model;
class EnclosureModel extends Model
{
    protected $table="ce_enclosure";
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'Createtime';//创建时间
    protected $updateTime = 'Updatetime';//更新时间
    //获取附件列表
    public function getEnclosureList($where,$start,$end){
        return $this->where($where)->page($start,$end)->order("id desc")->select();
    }
    //添加附件
    public function addEnclosure($data){
        return $this->save($data);
    }
    //删除附件
    public function deleEnclosure($id){
        return $this->save(["IsDelete"=>1],["ID"=>$id]);
    }
    //更新附件
    public function updateEnclosure($data,$id){
        return $this->save($data,["ID"=>$id]);
    }
    //获取附件列表
    public function getEnclosureByEmailID($id){
        return $this->where("EmailID",$id)->select();
    }
}

?>