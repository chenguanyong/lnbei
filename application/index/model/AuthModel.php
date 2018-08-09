<?php
namespace app\index\model;

use think\Model;
use app\index\model\AuthUserModel;
class AuthModel extends Model
{
    protected $table="ce_auth_com_city_role";
    public function getAuthList($companyID,$cityID,$roleID,$userID){
       $result = $this->where(["CompanyID"=>$companyID,"CityID"=>$cityID,"RoleID"=>$cityID])->select(); 
       $temp = "";
       foreach ($result as $value){
           if($value['IsAll'] == 1){
               return -1;//表示是有全部权限
           }
           $temp .= $value["Auth"];
       }
       $authUser = new AuthUserModel();
       $userRule = $authUser->getRuleUser($companyID, $cityID, $userID);
       if($userRule != null){
           $temp .= "," . $userRule;
       }
       $temparray = explode(",", $temp);
       $temparray = array_unique($temparray);
       return  implode(",",$temparray);
    }
    
    /**
     * 权限解析
     */
    public function praseAuth($data,$roleid){
        $nodeArray = explode(";", $data);
        
        $result = array();
        foreach ($nodeArray as $value){
            if(!empty($value)){
                $temp = explode("_", $value);
                $result[]=['CityID'=>$temp[0],'CompanyID'=>$temp[1],'Auth'=>$temp[2],'RoleID'=>$roleid];
            }   
        }
       // var_dump($result);
        // exit;
        return $result;
    }
    /**
     * 批量添加
     */
    public function addAuth($data){
        $this->startTrans();
        try{
            foreach($data as $value){
                $tempresult = $this->where(['CityID'=>$value['CityID'],'CompanyID'=>$value['CompanyID'],'RoleID'=>$value['RoleID']])->update(['Auth'=>$value['Auth']]);
                if($tempresult == null){
                    $this->data($value,true)->isUpdate(false)->save();
                }
            }
            $this->commit();
        }catch(\Exception $e){
            // echo "sdf";
            //echo $e->getMessage();
            $this->rollback();
            return null;
        }
        return true;
    }
}

?>