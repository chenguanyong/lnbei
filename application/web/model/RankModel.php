<?php
namespace app\web\model;

use think\Model;
class RankModel extends Model
{
    protected $table = "ce_rank";
    public function getWidgitByID($id){
       //$test = new TestModel();
       //$test->printSql();
       return $this->getWidgit(["ParentID"=>$id,"IsDelete"=>0], 0, 200);
    }
    public function getWidgit($where,$start,$num,$type = -1){
        if($type == -1){
            return $this->where($where)->page($start,$num)->select();
        }else{
            return $this->where($where)->page($start,$num)->order($type)->select();
        }
    }
    public function getWidgitCount($where,$start,$num,$type = -1){
        if($type == -1){
            return $this->where($where)->page($start,$num)->count();
        }else{
            return $this->where($where)->page($start,$num)->order($type)->count();
        }
    }
    public function getWidgitByIDAndFlag($id,$flag){
        return $this->getWidgit(["ParentID"=>$id,"IsDelete"=>0,"Flag"=>$flag], 0, 200);
    }
}

?>