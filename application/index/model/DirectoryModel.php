<?php
namespace app\index\model;

use think\Model;
class DirectoryModel extends Model
{
    protected  $table="ce_directory";
    
    public function getDirList($data){
        
        $result = $this->where($data)->order("ID DESC")->select();
        
        return $result;
    }
    //添加新的文件夹
    public function addFolder($data){
        $result = $this->where(["ParentID"=>$data["ParentID"],"FileName"=>$data["FileName"]])->find();
        if($result != null){
            return null;
        }
        return $this->save($data);  
    }
    //删除文件夹
    public function deleFolder($data){
        $result = $this->where("ParentID",$data)->find();
        if($result != null){
            return null;
        }
        return $this->save(["IsDelete"=>1],["ID"=>$data]);
    }
    //更新文件夹
    public function updateFolder($data,$where){
        $result = $this->join(" ce_directory as f","ce_directory.ID=f.ParentID")->where(["ce_directory.ID"=>$where,"FileName"=>$data["FileName"]])->find();
        if($result != null){
            return null;
        }
        return $this->save($data,["ID"=>$where]);        
    }
}

?>