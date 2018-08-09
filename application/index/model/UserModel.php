<?php
namespace app\index\model;
use \think\Model;
use think\Db;
class UserModel extends Model
{
    protected $table = 'ce_user';
    protected $pk = 'ID';
    public function initialize(){
    
        parent::initialize();
    }
    
    /**
     * @method 获取用户信息
     * @param 用户id*/
    
    public function getUser($UserID){
        
        $user = $this->get('UserID',$UserID);
        
        if($user == null){
            return null;
        }
        return $user;        
    }

    
    //添加用户
    public function addUser($userdata,$userInfo =array()){
    
        if(!is_array($userdata)){
           return array("code"=>0,"msg"=>"用户数据不存在！");
        }
        $result = $this->where(["UserName"=>$userdata["UserName"]])->find();
        if($result != null){
            
            return array("code"=>0,"msg"=>"用户名已存在！");
        }
        $userdata['PassWord'] = md5($userdata['PassWord']);
        $result = $this->save($userdata);
        if($result == null){
            return array("code"=>0,"msg"=>"添加失败!");
        }
        $int_userid = $this->ID;
        $this->save(['UserID'=>$int_userid],['ID'=>$int_userid]);
        if(count($userInfo) > 0){
            $userInfo['UserID'] = $int_userid;
            $result = $this->addUserInfo($userInfo);
            if($result){
                return array("code"=>1,"msg"=>"添加成功!");}
            else {
                return array("code"=>0,"msg"=>"添加失败!");
            }
        }
        return array("code"=>1,"msg"=>"添加成功!");
    }
    //添加用户详细信息
    public function addUserInfo($data){
       $result = Db::name("userinfo")->insert($data);
       if($result == 0){
           return false;
       }else{
           return true;
       }        
    }
    
    //查询用户
    protected function selectuser($username){
        $user = parent::get(['UserName'=>$username]);
        return $user;
    }
//     //更新用户
    public function updateUser($data,$id){
        $result = $this->get(["UserName"=>$data["UserName"]]);
        if($result == null){
            
            return array("code"=>0,"msg"=>"用户名已存在!");
        }
        $result = $this->save($data,['id'=>$id]);
        if($result ){
            return array("code"=>1,"msg"=>"更新成功!");
        }else{
            return array("code"=>0,"msg"=>"更新失败!");
        }
    }
//     //删除用户
    public function dele($id){
        $result = $this->save(["IsDelete"=>1],['UserID'=>$id]);
        if($result){
            
            $result = Db::name("userinfo")->where('UserID', $id)->update(['IsDelete'=>1]);
            if($result ){
                return array("code"=>1,"msg"=>"删除成功!");
            }else{
                return array("code"=>0,"msg"=>"删除失败!");
            }
        }else{
            
            return array("code"=>0,"msg"=>"删除失败!");
        }
    }
    
//     //返回密码
    public function getuserpassword($username){
    
        $user = self::selectuser($username);
    
        return $user->getAttr('PassWord');
    }
//     //返回所有信息
    public function getAllUserData($username){
    
        return self::selectuser($username);
    }
//     //获取指定部门id的用户列表
    public function getUserByDeparID($DeparID, $start, $length){
        
        $sql = 'SELECT ';
        $sql = $sql . 'users.UserName UserName, ';
        $sql = $sql . 'users.phone phone, ';
        $sql = $sql . 'users.moblie moblie, ';
        $sql = $sql . 'depart.ShortName CompanyName, ';
        $sql = $sql . 'depart.OrganizationName DeparName, ';
        $sql = $sql . 'users.Names AS Name ,';
        $sql = $sql . 'users.id AS ID ,';
        $sql = $sql . 'users.UserID AS UserID ';
        $sql = $sql . 'FROM ';
        $sql = $sql . 'ce_department AS depart, ';
        $sql = $sql . 'ce_user AS users ';
        $sql = $sql . 'WHERE ';
        $sql = $sql . 'depart.ID = users.DepartmentID ';
        $sql = $sql . 'AND depart.IsDelete = 0 ';
        $sql = $sql . 'AND users.IsDelete = 0 ';
        $sql = $sql . 'AND depart.ID = ' . $DeparID . '  ';
        $sql = $sql . 'limit ' . $start . ' , ' . $length ;
        
        $result = Db::query($sql);
        
        if($result == null){
            
            return null;
        }
        
        $sql = 'SELECT ';
        $sql = $sql . 'count(0) UserSize  ';
        $sql = $sql . 'FROM  ';
        $sql = $sql . 'ce_department AS depart, ';
        $sql = $sql . 'ce_user AS users ';
        $sql = $sql . 'WHERE ';
        $sql = $sql . 'depart.ID = users.DepartmentID ';
        $sql = $sql . 'AND depart.IsDelete = 0  ';
        $sql = $sql . 'AND users.IsDelete = 0  ';
        $sql = $sql . 'AND depart.ID = ' . $DeparID . ' ';
        
        $usersize = Db::query($sql);
        
        if($result == null){
        
            return null;
        }       
        
        return ['data'=> $result,'length' => $usersize[0]["UserSize"]];
    }
    
    //获取指定的用户资料
    public function getUserByID($id){
        return $this->alias('U')->field(" U.`UserID`, `U`.`UserName`, `U`.`Names`, `U`.`phone`, `U`.`moblie`, `U`.`DatetimeCreated`, `U`.`DatetimeUpdated`, `U`.`Image`, `U`.`Nickname`,ce_userinfo.*")->join("ce_userinfo","U.UserID = ce_userinfo.UserID")->where(["U.UserID"=>$id])->find();
    }
}

?>