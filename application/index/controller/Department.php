<?php
namespace app\index\controller;
use think\controller;
use think\View;
use think\Session;
use app\index\model\DepartmentModel;
use think\Request;
use app\common\controller\Base;
use think\Db;
class Department extends Base
{
    public function index(){
        return $this->fetch('index'); //$password;
        
    }
    /**
     * [getDepar 获取部门列表]
     * @return [type] [description]
     * @author
     */
    public function getDepar(){
        //初始化请求
        $request = Request::instance();
    
        //获取请求参数
        $query_data = $request->param();
        $Depart = new DepartmentModel();
        $result = $Depart->getDepart(["IsDelete"=>0,"ParentID"=>$query_data["id"]],$query_data['iDisplayStart'],$query_data['iDisplayLength']);
        if($result == null){
            return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0],JSON_UNESCAPED_UNICODE);
        }
        return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>$result['length'],'recordsFiltered'=>$result['length'],'data'=>$result['data']],JSON_UNESCAPED_UNICODE);
    }
    //获取部门列表
    public function getDeparList(){
        
        //初始化请求
        $request = Request::instance();
         
        //获取请求参数
        $query_data = $request->param();
        
        //var_dump($query_data);
        $username = '';
        $UserID = CheckUser();
        if($UserID == false){
        
            return $this->fetch('Login/login');
        }
        
        $username = Session::get("UserName");
        
        $menudata = new DepartmentModel();
        $ParentID =$query_data['id'];
        $result = $menudata->getDeparParentID($ParentID);
        //var_dump($result);
        return json($result);
    }
    //获取部门列表
    public function ajaxGetDepart(){
        $id = input("post.id");
        $flag = input("flag");
        if($id == null){
            $id = 0;
        }
        $where = ["ParentID"=>$id];
        if($flag == null){
            $flag = 0;
        }
        if($flag != 0){
            $where["Flag"] = $flag;
        }
        
        $depart = new DepartmentModel();
        $result = $depart->getDepartByParentID($where);
        //var_dump($result);exit();
        $new_result = array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['ParentID'];
            $new_result[$k]['name']=$v['ShortName'];
            $new_result[$k]['nocheck']=false;
            $new_result[$k]['drag']=false;
            $new_result[$k]['isParent']=self::isParent($v['ID']);
        }
        if(count($new_result) == 0){
            return json($new_result);
        }
        else{
            return json($new_result);
        }
    }
    public function isParent($id){
        return Db::name("department")->where("ParentID",$id)->select()==null?false:true;
    }
    //删除部门
    public function deleDepart(){
        $depart = input("get.id");
        if(!is_numeric($depart)){
            return json(array("code"=>0,"msg"=>"参数无效"));
        }
        $departModel = new DepartmentModel();
        $result = $departModel ->where("ID",$depart)->delete();
        if($result == null){
            
            return json(array("code"=>0,"msg"=>"删除失败"));
        }else{
            return json(array("code"=>1,"msg"=>"删除成功"));
        }
    }
    //设置部门
    public function setDepart(){
       $type = input("post.oper");
       if($type != null && $type== "edit"){
            return self::updateDepart();  
       }else if($type != null && $type== "add"){
            return self::addDepart();
       }
        
    }
    //添加部门
    public function addDepart(){
        $data = input("post.");
        if(!is_array($data)){
            return json(array("code"=>0,"msg"=>"参数无效"));
        }
        $depart = new DepartmentModel();
        $result = $depart->saveDepart(array("OrganizationName"=>$data['Name'],"ShortName"=>$data['shortname'],"IsDelete"=>$data['IsDelete'],"ParentID"=>$data['pid']));
        if($result == null){
            return json(array("code"=>0,"msg"=>"添加失败"));
        }else{
            return json(array("code"=>1,"msg"=>"添加成功"));
        }
        
    }
    //更新部门
    public function updateDepart(){
        $data = input("post.");
        if(!is_array($data)){
            return json(array("code"=>0,"msg"=>"参数无效"));
        }
        $depart = new DepartmentModel();
        $result = $depart->updateDepart(array("OrganizationName"=>$data['Name'],"ShortName"=>$data['shortname'],"IsDelete"=>$data['IsDelete']),["ID"=>$data['id']]);
        if($result == null){
            return json(array("code"=>0,"msg"=>"更新失败"));
        }else{
            return json(array("code"=>1,"msg"=>"更新成功"));
        }        
    }
    //获取部门列表
    public function ajaxGetDepartListZtree(){
        if(request()->isAjax()){
            $data = array();
            $id = input("post.id");
            if($id == null){
                $id = 0;
            }
            $companyid = 1;//Session::get("CompanyID")=0;
            $CityID = 1;//Session::get("CityID")=0;
            $data = array("ParentID"=>$id,"CompanyID"=>$companyid,"CityID"=>$CityID,"IsDelete"=>0);
            $directory = new DepartmentModel();
            $result = $directory->getDepartList($data);
             
            $new_result = array();
            foreach($result as $k=>$v){
                $new_result[$k]['id']=$v['ID'];
                $new_result[$k]['pId']=(int)$v['ParentID'];
                $new_result[$k]['name']=$v['ShortName'];
                //$new_result[$k]['iconSkin']=$v['css'];
                $new_result[$k]['isParent']=self::isParent($v['ID']);
                // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
                // $new_result[$k]['target'] = 'list_currency';
            }
            //var_dump($new_result);
            if($new_result != null){
                return json($new_result);
            }else{return json(array());}
        }
        return $this->fetch("index");
    }
    /**
     * 根据规则获取部门
     */
    public function getCompanyTree(){
        if(request()->isAjax()){
            $id = input("id");
            $companyID = input("companyID");
            $cityID = input("cityID");
            if($id == null){
                $id = 0;
            }
            if($companyID == null){
                $companyID = Session::get("companyID");
            }
            if($cityID == null){
                $cityID = Session::get("CityID");
            }
        
            $cityRule = new DepartmentModel();
            $result = $cityRule->getCompanyTree(Session::get("UserID"),  $cityID, $companyID, $id ) ;
            if($result == null){
                return json(["code"=>"0","msg"=>"无结果"]);
            }
            $new_result = array();
            foreach($result['data'] as $k=>$v){
                $new_result[$k]['id']=$v['ID'];
                $new_result[$k]['pId']=(int)$v['ParentID'];
                $new_result[$k]['name']=$v['ShortName'];
                //$new_result[$k]['iconSkin']=$v['css'];checked:true
                $new_result[$k]['isParent']=self::IsCompanyParent($v['ID'],$result['rule']);
                // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
                // $new_result[$k]['target'] = 'list_currency';
                if($result['rule'] === "-1"){
                    $new_result[$k]['checked']=true;
                }else{
                    if(stripos($result['rule'],$v['ID']) === FALSE){
                        $new_result[$k]['checked']=false;
                    }else {
                        $new_result[$k]['checked']=true;
                    }
                }
            }
            return json($new_result);
        }
    }
    /**
     * 判断是父节点
     */
    private function IsCompanyParent($pid,$ids){
        $result = Db::name('department')->where(["ParentID"=>$pid,"ID"=>["IN",$ids]])->count();
        if($result > 0){
            return true;
        }else{
            return false;
        }
    }
}

?>