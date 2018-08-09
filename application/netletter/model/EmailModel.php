<?php
namespace app\netletter\model;

use think\Model;
class EmailModel extends Model
{
    protected $table="ce_email";
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'Createtime';//创建时间
    protected $updateTime = 'Updatetime';//更新时间
    
    //获取邮件的列表
    public function getEmailList($where,$start,$rownum,$sort = 0){
       $sortStr = " ID ";
        switch ($sort){
            case "1": $sortStr=" Createtime ";break;
            case "2": $sortStr = " Title ";break;
            case "3": $sortStr = " To ";break;
        }
       return $this->where($where)->page($start,$rownum)->order($sortStr . " desc")->select(); 
    }
    //获取邮件列表数据
    public function getEmailCount($where){
        return $this->where($where)->count();
    }
    //添加邮件
    public function addEmail($data){
        return $this->save($data);
    }
    //删除邮件
    public function deleEmail($id){
        return $this->save(["IsDelete"=>1],["ID"=>$id]);
    }
    //更新邮件
    public function updateEmail($data,$id){
        return $this->save($data,["ID"=>$id]);
    }
    //批量保存
    public function saveAllEmail($data){
        return $this->saveAll($data);
    }
    //获取单个邮件
    public function getEmailbyID($id){
        return $this->where("ID",$id)->find();
    }
    
}

?>