<?php
namespace com\lnbei;
use think\Validate;
class InputValidate extends Validate
{
    public function __construct(){
        parent::__construct();
        
    }
    //规则
    protected $rule = [
        'name' => 'require|max:25',//用户姓名
        'email' => 'email',//用户邮箱
        'companyName' => 'alphaNum',//归属公司
        'companyID' => 'number',//归属公司ID
        'officeName' => 'alphaNum',//办公室姓名
        'officeNameID' => 'number',//办公室ID
        'noID' => 'number',//工号
        'loginName' => 'alphaNum|max:25',//登录名
        'newPassword' => 'alphaDash|max:25',//新密码
        'mobile' => 'number',//手机号
        'loginFlag' => 'accepted',//是否登录标志
        'userType' => 'number',//用户类型
        'userRole' => 'number',//用户角色
        'remarks' => 'max:30',//备注
        'age' =>'number|between:1,120'
    ];
    protected $message = [
        'name.require' => '用户名必须',
        'email' => '邮箱格式错误',
    ];
    //用户编辑场景
    private $editUser = ['name',//用户姓名
        'email',//用户邮箱       
        'companyID',//归属公司ID       
        'officeNameID',//办公室ID
        'noID',//工号
        'loginName',//登录名
        'newPassword',//新密码
        'mobile',//手机号
        'loginFlag',//是否登录标志
        'userType' ,//用户类型
        'userRole',//用户角色
        'remarks' ,//备注
        ];
    //场景数组
    protected $scene = [
        'login' =>['loginName','newPassword'],
        'editUser' => $this->editUser,
    ];
    
    //验证编辑用户场景
    public function checkEditUser($data){
        
      return $this->scene('editUser')->check($data);
        
    }
    //验证用户登录场景
    public function checkLogin($data){
    
        return $this->scene('login')->check($data);
    
    }
}

?>