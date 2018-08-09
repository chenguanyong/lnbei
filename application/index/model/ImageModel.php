<?php
namespace app\index\model;

use think\Model;
class ImageModel extends Model
{
    protected  $table="ce_image";//表名
    public function getImageList($where,$start,$row){
        
        return $this->field("ce_image.ID,ce_image.URL,ce_image.FileID,ce_image.ImageName")->join("ce_directory"," ce_image.FileID = ce_directory.ID")->where($where)->page($start,$row)->select();
    }
    //返回图片数量
    public function getImageCount($where){
        return $this->join("ce_directory"," ce_image.FileID = ce_directory.ID")->where($where)->count();
    }
    //添加图片
    public function addImage($data){
        return $this->save($data);
    }
    //删除图片
    public function deleImage($id){
        
        return $this->update(["IsDelete"=>1,"id"=>$id]);
    }
    //修改图片
    public function updateImage($data,$id){
        
        return $this->save($data,["id"=>$id]);
    }
    //批量更新图片
    public function addImages($data){
        return $this->saveAll($data);
    }
    
}

?>