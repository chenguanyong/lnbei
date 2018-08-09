<?php
namespace app\web\model\widget;

use think\Model;
use think\Db;
class PageModel extends Model
{
    protected $table = "ce_pagehtml";
    public function getPageByID($id,$companyID =0,$cityID=0){
        return $this->getPage(["NavID"=>$id,"IsDelete"=>0,"CompanyID"=>$companyID,"CityID"=>$cityID], 0, 200);
    }
    public function getPage($where,$start,$num,$type = -1){
        if($type == -1){
            return $this->where($where)->page($start,$num)->select();
        }else{
            return $this->where($where)->page($start,$num)->order($type)->select();
        }
    }
    public function getPageCount($where,$start,$num,$type = -1){
        if($type == -1){
            return $this->where($where)->page($start,$num)->count();
        }else{
            return $this->where($where)->page($start,$num)->order($type)->count();
        }
    }
    public function getPageByIDAndFlag($id,$flag){
        return $this->getPage(["ParentID"=>$id,"IsDelete"=>0,"Flag"=>$flag], 0, 200);
    }
}

?>