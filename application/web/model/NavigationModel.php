<?php
namespace app\web\model;
//导航
use think\Model;
class NavigationModel extends Model
{
    protected  $table = "ce_navigation";
    /**
     * 获取导航列表
     * @param unknown $where
     * @param unknown $start
     * @param unknown $num
     */
    public function getNavigation($where,$start,$num){

        return $this->where($where)->page($start,$num)->order("ID asc")->select();
    }
    /**
     * 添加导航
     * 
     */
    public function addNavigation($data){
        
        $result = $this->where(['Name'=>$data['Name'],'CompanyID'=>$data['CompanyID'],"CityID"=>$data['CityID']])->count();
        if($result == 0){
            return null;
        }  
        $result = $this->isUpdate(false)->save($data);
        return $result;
    }
    /**
     * 删除导航
     */
    public function deleNavigation($id){
        
        return $this->where("ID",$id)->delete();
    }
    /**
     * 更新导航
     */
    public function updateNavigation($data,$id){
        return $this->save($data,['ID'=>$id]);
    }
    /**
     * 获取导航类表根据父ID
     */
    public function getNavByPid($pid){
        
        return $this->getNavigation(["ParentID"=>$pid], 0, 200);
    }
}

?>