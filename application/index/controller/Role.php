<?php
namespace app\index\controller;
use think\controller;
use think\View;
use think\Session;
use think\Request;
use app\common\controller\Base;
use app\index\model\RoleModel;
use app\index\model\AuthModel;
class Role extends Base
{
    /**
     * [index 用户列表]
     * @return [type] [description]
     * @author
     */
    public function index()
    {       
         return $this->fetch('index'); //$password;
    }
    /**
     * [getRole 获取角色列表]
     * @return [type] [description]
     * @author
     */
     public function getRole(){
         //获取请求参数
         $query_data = input("get.");
         $role = new RoleModel();
         $where = array("IsDelete"=>0);
         //$where["State"] = 1;
         if($query_data["cp"] != null){
             $where["CompanyID"] = $query_data["cp"];
         }else{
             $where["CompanyID"] = Session::get("companyID");
         }
         if($query_data["ct"] != null){
             $where["CityID"] = $query_data["ct"];
         }else{
             $where["CityID"] = Session::get("CityID");
         }
         if(isset($query_data["keyword"])&& $query_data["keyword"] != null){
             $where["RoleName"] = array("like","'%". $query_data["keyword"]."%'");
         }
        // var_dump($where);
         $result = $role->getRole($where,$query_data['iDisplayStart'],$query_data['iDisplayLength']);
         if($result == null){
            return json(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0]);
        }
        return json(['draw'=>$query_data['sEcho'],'recordsTotal'=>$result['length'],'recordsFiltered'=>$result['length'],'data'=>$result['data']]);
     } 

     /**
      * 编辑角色
      */
     public function editRole(){
         if(request()->isAjax()){
             $role = new RoleModel();
             $data = input("post.");
             $datas = array();
             foreach ($data as $key=>$value){
                 
                 if($value!=""){
                     $datas[$key]=$value;
                 }
             }
             $result = $role ->updateRole($datas);
              if($result == null){
                  return json(array("code"=>0,"msg"=>"修改失败"));
              }else{
                  return json(array("code"=>1,"msg"=>"修改成功"));
              } 
         }  
     }
     /**
      * 添加角色
      */
     public function addRole(){
         if(request()->isAjax()){
             $role = new RoleModel();
            $data = input("post.");
            if(isset($data['ID'])){
                unset($data["ID"]);
            }
            //var_dump($data);
            //exit;
            $result = $role ->addRole($data);
            if($result == null){
                return json(array("code"=>0,"msg"=>"添加失败"));
            }else{
                return json(array("code"=>1,"msg"=>"添加成功"));
            } 
         }  
     }
     /**
      * 删除角色
      */
     public function deleRole(){
         
         if(request()->isAjax()){
             $role = new RoleModel();
             $id = input("id");
             $result = $role ->deleRole($id);
             if($result == null){
                 return json(array("code"=>0,"msg"=>"删除失败"));
             }else{
                 return json(array("code"=>1,"msg"=>"删除成功"));
             } 
         }
     }
     /**
      * [setRole 设置角色]
      * @return [type] [description]
      * @author
      */
     public function getRoleList(){

          
         $result = RoleModel::column('RoleID','RoleName');

        $back_array = array();
        $int_array = 0;
        foreach ($result as $key=>$value){
           // echo $key;
            $back_array[$int_array]=array('title'=>$key,'id'=>$value);
            $int_array++;
        }
    
        return json_encode($back_array, JSON_UNESCAPED_UNICODE);
     }
     /**
      * 分配权限
      */
     public function allotAuth(){
        
         return $this->fetch("auth");
     }
     /**
      * 添加权限
      */
     public function addAuth(){
         if(request()->isAjax()){
             $roleid = input("roleid");
             $auths = input("auth");
             if(empty($auths)){
                 return json(["code"=>0,"msg"=>"数据为空"]);
             }
             $auth = new AuthModel();
             $autharray = $auth->praseAuth($auths, $roleid);
             if($autharray != null){
                 $result = $auth->addAuth($autharray);
                if($result){
                    return json(["code"=>1,"msg"=>"添加成功"]);
                }else{
                    return json(["code"=>0,"msg"=>"添加失败"]);
                }
             }else{
                 return json(["code"=>0,"msg"=>"添加失败"]);
             }
         }else{
             return $this->fetch("index");
         }
     }
}

?>