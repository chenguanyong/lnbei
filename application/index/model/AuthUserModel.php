<?php
namespace app\index\model;

use think\Model;
class AuthUserModel extends Model
{
    protected $table = "ce_auth_com_city_user";
    public function getRuleUser($companyID,$cityID,$userID){
        $rule = $this->where(["CompanyID"=>$companyID,"CityID"=>$cityID,"UserID"=>$userID])->find();
        if($rule == null){
            return null;
        }else{
            return $rule['Auth'];
        }
    }
    /**
     * 权限解析
     */
    public function praseAuth($data,$userid){
        $nodeArray = explode(";", $data);
        $result = array();
        
        foreach ($nodeArray as $value){
            if(!empty($value)){
                $temp = explode("_", $string);
                $result[]=['CityID'=>$temp[0],'CompanyID'=>$temp[1],'Auth'=>$temp[2],'UserID'=>$userid];
            }
        }
        return $result;
    }
    /**
     * 批量添加
     */
    public function addAuth($data){
        $this->startTrans();
        try{
            foreach($data as $value){
               $tempresult = $this->where(['CityID'=>$value['CityID'],'CompanyID'=>$value['CompanyID'],'UserID'=>$value['UserID']])->update(['Auth'=>$value['Auth']]);
                if($tempresult == null){
                    $this->isUpdate(false)->save($value);
                }
            }
        $this->commit();
         }catch(\Exception $e){
           // echo "sdf";
             $this->rollback();
             return null;
        }
        return true;
    }
    
}

?>