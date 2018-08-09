<?php
namespace app\index\model;
use \think\Model;
use think\Session;
class RoleModel extends Model
{
    protected  $table = 'ce_role';
    protected  $pk = 'ID';
    public function getRole($where,$page,$rownum){
       $count = $this->where($where)->count('ID');
       $back_result = array();
       $i = 0;
       $result = $this->where($where)->limit($page,$rownum)->select();
       foreach ($result as $result_row){
           
           $back_result[$i]['ID'] = $result_row['RoleID'];
           $back_result[$i]['RoleName'] = $result_row['RoleName'];
           $back_result[$i]['IsDelete'] = $result_row['IsDelete'];
           $back_result[$i]['DatetimeCreated'] = $result_row['DatetimeCreated'];
           $back_result[$i]['DatetimeUpdated'] = $result_row['DatetimeUpdated'];
           $back_result[$i]['Css'] = $result_row['Css'];
           $i++;
       }
      return ['data'=> $back_result,'length' => $count];
      
    }
    public function  addRole($Roledata){
        
        $role = $this->where("RoleName",$Roledata['RoleName'])
        ->find();
        if($role != null){
            return null;
        }
        $id = $this->Max('ID');
        $id++;
        $Roledata['RoleID'] = $id;
        $Roledata['DatetimeCreated']=date('Y-m-d H:i:s', time()); 
        $Roledata['DatetimeUpdated']=date('Y-m-d H:i:s', time()); 
        $result = $this->isUpdate(false)->save($Roledata);
        return $result;
        
    }
    public function deleRole($RoleID){
        
      return $this->save(['IsDelete'=>1],['ID'=>$RoleID]);
    }
    public function updateRole($Roledata){
        $role = $this->where("RoleName",$Roledata['RoleName'])
        ->find();
        
        if($role != null){
            return null;
        }
        $Roledata['DatetimeUpdated']=date('Y-m-d H:i:s', time());
        return $this->update($Roledata);
    }
}

?>