<?php
namespace app\web\model;

use think\Model;
use app\common\widget\callback\WidgetCurrentModalCallback;
class PageUserModel extends Model implements WidgetCurrentModalCallback
{
    protected $table = "ce_pageuser";

    public function getWidgetFileByUserID($where){
        return $this->where($where)->find();
    }
    public function addWidgetFileByUserID($data){
        self::addPageUser($data);
    }
    public function updateWidgetFileByUserID($data,$where){
        self::updatePageUser($data, $where);
    }
    public function getwidgetFileByPid($where, $page, $pageSize){
       return self::getPageUserListByWhere($where, $page, $pageSize);
    }
    private function getPageUserListByWhere($where,$page=1,$pageSize=20){
        return $this->where($where)->page($page,$pageSize)->select();
    }
    private function addPageUser($data){
        $this->data($data);
        $this->save();
        return $this->ID;
    }
    private function updatePageUser($data,$where){
        $this->save($data,$where);
    }  
    private function delePageUser($where){
        $this->where($where)->delete();
    }
}

?>