<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: luofei614 <weibo.com/luofei614>　
// +----------------------------------------------------------------------
namespace auth;
use think\Session;
use think\Db;
/**
 * 权限认证类
 * 功能特性：
 * 1，是对规则进行认证，不是对节点进行认证。用户可以把节点当作规则名称实现对节点进行认证。
 *      $auth=new Auth();  $auth->check('规则名称','用户id')
 * 2，可以同时对多条规则进行认证，并设置多条规则的关系（or或者and）
 *      $auth=new Auth();  $auth->check('规则1,规则2','用户id','and') 
 *      第三个参数为and时表示，用户需要同时具有规则1和规则2的权限。 当第三个参数为or时，表示用户值需要具备其中一个条件即可。默认为or
 * 3，一个用户可以属于多个用户组(think_auth_group_access表 定义了用户所属用户组)。我们需要设置每个用户组拥有哪些规则(think_auth_group 定义了用户组权限)
 * 
 * 4，支持规则表达式。
 *      在think_auth_rule 表中定义一条规则时，如果type为1， condition字段就可以定义规则表达式。 如定义{score}>5  and {score}<100  表示用户的分数在5-100之间时这条规则才会通过。
 */



class Auth{

    //默认配置
    protected $_config = array(
        'auth_on'           => true,                      // 认证开关
        'auth_type'         => 2,                         // 认证方式，1为实时认证；2为登录认证。
       
    );
    protected $auth = array();
    protected $companyAuth = array();
    protected $cityAuth = array();
    public function __construct() {
        if (config('auth_config')) {
            //可设置配置项 auth_config, 此配置项为数组。
            $this->_config = array_merge($this->_config, config('auth_config'));
        }
    }

    /**
      * 检查权限
      * @param name string|array  需要验证的规则列表,支持逗号分隔的权限规则或索引数组
      * @param uid  int           认证用户的id
      * @param string mode        执行check的模式
      * @param relation string    如果为 'or' 表示满足任一条规则即通过验证;如果为 'and'则表示需满足所有规则才能通过验证
      * @return boolean           通过验证返回true;失败返回false
     */
    public function check($name, $uid, $companyid, $cityid, $type=1, $mode='url', $relation='or') {
       // echo "sds";
        if (!$this->_config['auth_on']){
            return true;
        }
        $authList = $this->getAuthList($uid,$type,$companyid,$cityid); //获取用户需要验证的所有有效规则列表

        if (is_string($name)) {
            $name = strtolower($name);
            if (strpos($name, ',') !== false) {
                $name = explode(',', $name);
            } else {
                $name = array($name);
            }
        }
        $list = array(); //保存验证通过的规则名
        if ($mode=='url') {
            $REQUEST = unserialize( strtolower(serialize($_REQUEST)) );
        }
        foreach ( $authList as $auth ) {
            $query = preg_replace('/^.+\?/U','',$auth);
            if ($mode=='url' && $query!=$auth ) {
                parse_str($query,$param); //解析规则中的param
                $intersect = array_intersect_assoc($REQUEST,$param);
                $auth = preg_replace('/\?.*$/U','',$auth);
                if ( in_array($auth,$name) && $intersect==$param ) {  //如果节点相符且url参数满足
                    $list[] = $auth ;
                }
            }else if (in_array($auth , $name)){
                $list[] = $auth ;
            }
        }
	//	dump($list);exit;
        if ($relation == 'or' and !empty($list)) {
            return true;
        }
        $diff = array_diff($name, $list);
        if ($relation == 'and' and empty($diff)) {
            return true;
        }
        return false;
    }

    /**
     * 根据用户id获取用户组,返回值为数组
     * @param  uid int     用户id
     * @return array       用户所属的用户组 array(
     *     array('uid'=>'用户id','group_id'=>'用户组id','title'=>'用户组名称','rules'=>'用户组拥有的规则id,多个,号隔开'),
     *     ...)   
     */
    public function getGroups($uid,$cityid=0,$companyid=0) {
        static $groups = array();
        if (isset($groups[$uid])){
            return $groups[$uid];
        }
        $where = "g.UserID='$uid' and a.IsDelete='0'"; 
        if($cityid != 0){
            $where .= " and a.CityID='$cityid'";
        }
        if($companyid != 0){
            $where .= " and a.CompanyID = '$companyid'";
        }
        $admin =null;
        $user_groups = \think\Db::table('ce_role')
            ->alias('a')
            ->join("ce_role_user g", "g.RoleID = a.RoleID")
            ->where($where)
            ->field('a.RoleID,a.CityAuth,a.CompanyAuth')->select();
        $groups[$uid] = $user_groups ? $user_groups : array();
        return $groups[$uid];
    }

    public function getGroupsRole($uid,$cityid=0,$companyid=0) {
        static $groupsrole = array();
        if (isset($groupsrole[$uid.$cityid.$companyid]))
            return $groupsrole[$uid.$cityid.$companyid];
            $where = "g.UserID='$uid' ";
            if($cityid != 0){
                $where .= " and a.CityID='$cityid'";
            }
            if($companyid != 0){
                $where .= " and a.CompanyID = '$companyid'";
            }
            $admin =null;
            $user_groups = \think\Db::table('ce_auth_com_city_role')
            ->alias('a')
            ->join("ce_role_user g", "g.RoleID = a.RoleID")
            ->where($where)
            ->field('a.RoleID,a.Auth')->select();
            $groupsrole[$uid.$cityid.$companyid] = $user_groups ? $user_groups : array();
           // var_dump($groupsrole);
            return $groupsrole[$uid.$cityid.$companyid];
    }
    public function getGroupsUser($uid,$cityid=0,$companyid=0) {

        static $groupsUser = array();
        if (isset($groupsUser[$uid.$cityid.$companyid])){
            
            return $groupsUser[$uid.$cityid.$companyid];}
            
            $where = "a.UserID='$uid' ";
            if($cityid != 0){
                $where .= " and a.CityID='$cityid'";
            }
            if($companyid != 0){
                $where .= " and a.CompanyID = '$companyid'";
            }
            $admin =null;
            $user_groups = \think\Db::table('ce_auth_com_city_user')
            ->alias('a')
            ->where($where)
            ->field('Auth')->select();
            $groupsUser[$uid.$cityid.$companyid] = $user_groups ? $user_groups : array();
            //var_dump($groupsUser);
            return $groupsUser[$uid.$cityid.$companyid];
    }
    
    /**
     * 获得权限列表
     * @param integer $uid  用户id
     * @param integer $type 
     */
    protected function getAuthList($uid,$type,$companyid,$cityid) {
       
        static $_authList = array(); //保存用户验证通过的权限列表
        $t = implode(',',(array)$type);
        if (isset($_authList[$uid.$t.$companyid.$cityid])) {
          // echo "dd";
            return $_authList[$uid.$t.$companyid.$cityid];
        }

        if( $this->_config['auth_type']==2 && \think\Session::get('_auth_list_'.$uid.$t)){
          //  echo "df";
            return \think\Session::get('_auth_list_'.$uid.$t);
        }
//        echo $companyid;
//        echo $cityid;
//        exit;
        $groupsuser =self::getGroupsUser($uid,$cityid,$companyid);
        //echo "dfs";
       // var_dump($groupsuser);
       
        //读取用户所属用户组
        $groups = $this->getGroupsRole($uid,$cityid,$companyid);
       // var_dump($groups);
        
        $groups = array_merge($groups,$groupsuser);
        //var_dump($groups);
        
        $ids = array();//保存用户所属用户组设置的所有权限规则id
        foreach ($groups as $g) {
            $ids = array_merge($ids, explode(',', trim($g['Auth'], ',')));
        }
        $ids = array_unique($ids);
       // var_dump($ids);
        
        if (empty($ids)) {
            $_authList[$uid.$t.$companyid.$cityid] = array();
            return array();
        }
        $ids = trim(implode(",",$ids),",");
        $map=array(
            'id'=>array('in',$ids),
            'CompanyID'=>$companyid,
            'CityID'=>$cityid,
            'IsDelete'=>0,
        );
        //读取用户组所有权限规则
        $rules = \think\Db::table('ce_menu')->where($map)->field('Condition,URL')->select();
        //var_dump($rules);
        
       
       // 
        //循环规则，判断结果。
        $authList = array();   //
        foreach ($rules as $rule) {
            if (!empty($rule['Condition'])) { //根据condition进行验证
                $user = $this->getUserInfo($uid);//获取用户信息,一维数组

                $command = preg_replace('/\{(\w*?)\}/', '$user[\'\\1\']', $rule['Condition']);
                //dump($command);//debug
                @(eval('$Condition=(' . $command . ');'));
                if ($Condition) {
                    $authList[] = strtolower($rule['URL']);
                }
            } else {
                //只要存在就记录
                $authList[] = strtolower($rule['URL']);
            }
        }
        $_authList[$uid.$t.$companyid.$cityid] = array_unique($authList);
        if($this->_config['auth_type']==2){
            //规则列表结果保存到session
            \think\Session::set('_auth_list_'.$uid.$t.$companyid.$cityid, $authList);
        }
        return $_authList[$uid.$t.$companyid.$cityid];
    }
/*
 * 获取地区权限
 */
    public function getCityAuth($uid,$cityid,$companyid){
        $sessionid = session_id();
        $auth = "";
        if(Session::has("CityAuth" . $sessionid) == null){
            
            $authlist = self::getGroups($uid,$cityid,$companyid);
            //var_dump($authlist);
            foreach ($authlist as $value){
                if($value["CityAuth"] != null){
                $auth .=$value["CityAuth"];
                }
            }
           // var_dump($auth);
           // exit;
            $auths = self::getUerAuth($uid, $cityid, $companyid);
           // var_dump($auths);
            
            $auth = trim($auth, ",") . "," . trim($auths["CityAuth"] , ",");
            $auth = implode(",", array_unique(explode(",",$auth)));
            Session::set("CityAuth" . $sessionid,$auth);
            return $auth;
        }else{
            return Session::get("CityAuth" . $sessionid);
        }
    }
    /**
     * 获取部门的权限
     */
    public function getCompanyID($uid,$cityid,$companyid){

        $sessionid = session_id();
        $auth = "";
        if(Session::has("CompanyAuth" . $sessionid) == null){
        
            $authlist = self::getGroups($uid,$cityid,$companyid);
            foreach ($authlist as $value){
                if($value["CompanyAuth"] != null){
                    $auth .=$value["CompanyAuth"];
                }
            }
            $auths = self::getUerAuth($uid, $cityid, $companyid);
            $auth = trim($auth, ",") . "," . trim($auths["CompanyAuth"] , ",");
            $auth = implode(",", array_unique(explode(",",$auth)));
            Session::set("CompanyAuth" . $sessionid,$auth);
            return $auth;
        }else{
            return Session::get("CompanyAuth" . $sessionid);
        }
    }
    /**
     * 获得用户资料,根据自己的情况读取数据库
     */
    protected function getUserInfo($uid,$cityid,$companyid) {
        static $userinfo=array();
        if(!isset($userinfo[$uid])){
             $userinfo[$uid]=\think\Db::table('ce_admin')->where('id',$uid)->find();
        }
        return $userinfo[$uid];
    }
    /**
     * 获取用户的权限
     */
    public function getUerAuth($uid,$cityid,$companyid){
        $where = "UserID='$uid'";
        $result = \think\Db::table('ce_user_auth')->where($where)->find();
        if($result){return $result;}else{
            return false;
        }
    }
}
