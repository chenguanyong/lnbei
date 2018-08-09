<?php
namespace app\index\controller;

use think\Request;
use think\Session;
use think\Controller;
use think\Validate;
use app\index\model\UserModel;
use think\Db;
use app\common\user\User;
use com\lnbei\serialize\LBSerialize;
class Login extends Controller{
    
    //验证登陆规则
    protected $rule_login = [
        'UserName' => '[A-Z,a-z,0-9,_]{0,10}',
        'PassWord' => '[A-Z,a-z,0-9,_,@,\.]{0,10}',
        
    ];
    //验证修改密码规则
    protected $rule_fix_password = [
        'UserName' => 'require|max:25',
        'email' => 'email',
    
    ];
    //验证注册规则
    protected $rule_register = [
        'UserName' => 'require|max:25',
        'email' => 'email',
    
    ];
   public  function index() {
       
       //初始化请求
       $request = Request::instance();
       
       //获取请求参数
       $query_data = $request->param();
       //var_dump($query_data);
       $data_array = explode('-', $query_data['data']);
       
       if(count($data_array) < 1){ return json_encode(array("res" =>'0')); }
       
       $validate = new Validate($this->rule_login);
       
       $flog = $validate->check([array("UserName"=>$data_array[0], "PassWord"=>$data_array[1])]);
       
       if(!$flog){
          // echo $validate->getError();
           return json_encode(array("res" =>'0'));           
       }
       //初始化模型
       $user = new UserModel();
       $user_object = $user->getAllUserData($data_array[0]);
       $username = $user_object->getAttr('UserName');
       $password = $user_object->getAttr("PassWord");
       $UserID = $user_object->getAttr("UserID");
       $CompanyID = $user_object->getAttr("CompanyID");
       $DepartmentID = $user_object->getAttr("DepartmentID");
       $CityID = $user_object->getAttr("CityID");//Names
       $realName = $user_object->getAttr("Names");
       $postpassword = md5($data_array[1]); 
       if($password != $postpassword){
           
           return json_encode(array("res" =>'0'));
       }
       Session::set("UserName", $username);
       Session::set("UserID", $UserID);
       Session::set("companyID", $CompanyID);
       //Session::set("DepartmentID", $UserID);
       Session::set("CityID", $CityID);
       $roleID = Db::table("ce_role_user")->where("UserID",$UserID)->find();
       $roleName = Db::table("ce_role")->where("RoleID",$roleID['RoleID'])->find();
       Session::set("RoleID",$roleID['RoleID']);
       
       $user = new User();
       $user->userID = $UserID;
       $user->name = $username;
       $user->realName=$realName;
       $user->roleID=$roleID['RoleID'];
       $user->roleName=$roleName['RoleName'];
       $user->departmentID= $CompanyID;
       $user->department='';
       $user->cityID = $CityID;
       $user->cityName = '';
       Session::set("__USER__",LBSerialize::serialize($user));
       return json_encode(array("res" =>'1'));
    }
    
    //退出
    public function loginOut(){
        Session::clear();
        return $this->fetch('login');
    }
    //注册
    public function register(){
        if(request()->isAjax()){
            $data = input("post.");
            if(empty($data)){
                return json(array("code"=>0,"msg"=>"参数无效"));
            }
            $user = new UserModel();
            $admin = array();
            $adminInfo = array();
            foreach ($data as $key=>$value){
                if(!empty($value)){
                $re = explode("_", $key);
                if($re[0] == "ex"){
                    $adminInfo[$re[1]] = $value;
                }else{
                    $admin[$re[0]] = $value;
                }
                }
            }
            if($admin['PassWord'] != $admin['rePassword']){
                return json(array("code"=>0,"msg"=>"两次输入的密码不一致"));
            }
            unset($admin['rePassword']);
            $admin['Agreement'] = $admin['agree'] == "on"? 1:0;
            unset($admin['agree']);
            return json($user->addUser($admin,$adminInfo));
        }
    }
    //找回密码
    public function findPassword(){
        
        
    }
    //发送验证码
    public function sendCheckCode(){
        if(request()->isAjax()){
            
           return json(["code"=>1,"msg"=>"发送成功"]); 
        }
    }
    //找回邮箱
    public function findEmail(){}
    //获取邮箱验证码
    public function findEmailCode(){}
    //注册成功
    public function sucess(){
        
        return  $this->fetch("sucess");
    }
}