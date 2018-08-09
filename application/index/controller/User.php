<?php
namespace app\index\controller;
use think\controller;
use app\index\model\UserModel;
use think\Session;
use think\Request;
use think\Db;
use app\common\controller\Base;
use app\index\model\AuthUserModel;

class User extends Base
{
    public function index(){
        
        $UserID = CheckUser();
        if($UserID == false){
        
            return $this->fetch('Login/login');
        }
        return $this->fetch('index');
    }
    //通过部门id获取用户
    public function getUserByDepartID(){

        //初始化请求
        $request = Request::instance();
        //获取请求参数
        $query_data = $request->param();
        
        $user = new UserModel(); 
        $user_array = $user->getUserByDeparID(1,$query_data['iDisplayStart'],$query_data['iDisplayLength']);
        if($user_array == null){
            
            return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0],JSON_UNESCAPED_UNICODE);
        }
        return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>$user_array['length'],'recordsFiltered'=>$user_array['length'],'data'=>$user_array['data']],JSON_UNESCAPED_UNICODE);
    }
    
    public function editUser(){
         if(request()->isAjax()){
            //初始化请求
            $request = Request::instance();
            //获取请求参数
            $query_data = $request->param();
            //var_dump($query_data);
            //exit();
            
            $data = array("UserName"=>$query_data["loginName"],"Names"=>$query_data["name"],"PassWord"=>md5(trim($query_data["newPassword"])),"DepartmentID"=>$query_data["officeNameID"],"companyID"=>$query_data["companyID"],"phone"=>$query_data["phone"],"moblie"=>$query_data["mobile"],"IsDelete"=>$query_data["loginFlag"]);
            $datainfo = array("bz"=>$query_data["remarks"],"email"=>$query_data["email"],"workID"=>$query_data["noID"]);
            $user = new UserModel();
            if($query_data["type"] == 1){
                
                $result = $user->addUser($data,$datainfo);
            }else if($query_data["type"] == 3){
                $id=$query_data["id"];
                $result = $user->updateUser($data,$id);
                $datainfo['ID'] = $id;
                Db::name("userinfo")->update($datainfo);
                return $result;
            }
            return $result;
         }
        return $this->fetch();
    }
    //删除用户
    public function deleUser(){
        $id = input("post.id");
        $user = new UserModel();
       return $user->dele($id);
        
    }
    //用户中心
    public function userProfile(){
        return $this->fetch('profile');
    }
    //时间线
    public function timeline(){
        return $this->fetch('timeline');
    }
    //获取详细的个人资料
    public function getUserInfo(){

        if(request()->isAjax()){
            $userid = Session::get("UserID");
            $user = new UserModel();
            $userInfo = $user->getUserByID($userid);
            if($userInfo == null){
                return json(["code"=>0,"msg"=>"获取数据失败"]);
            }else{
                return json(["code"=>1,"msg"=>"获取数据成功","data"=>$userInfo]);
            }
        }
    }
    /**
     * 添加权限
     */
    public function addAuth(){
        if(request()->isAjax()){
            //$roleid = input("roleid");
            $userid =  Session::get("UserID");
            $auth = input("auth");
            if(empty($auth)){
                return json(["code"=>0,"msg"=>"数据为空"]);
            }
            $auth = new AuthUserModel();
            $autharray = $auth->praseAuth($auth, $userid);
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
    /**
     * 完善资料
     */
    public function detailInfo(){
        if(request()->isAjax()){
            
            return $this->fetch("personal_profile");
        }
    }
    /**
     * 保存资料--个人资料
     */
    public function saveDetailInfo(){
        if(request()->isAjax()){
            
            return json(["code"=>1,"msg"=>"成功"]);
        }
        
    }
    /**
     * 验证方式
     */
    public function verification(){
        if(request()->isAjax()){
        
            return $this->fetch("verification");
        }
    }
    /**
     * 修改头像
     */
    public function editAvatar(){}
}

?>