<?php
namespace app\index\controller;
/*
 * 目录操作类
 */
use app\common\controller\Base;
use app\index\model\DirectoryModel;
use think\Session;
use lib\file\DirectoryOption;
use think\Exception;
class Directory extends Base
{
    /**
     * [index 首页]
     * @return [type] [description]
     * @author cgy
     */
    public function index(){
        if(request()->isAjax()){
            $data = array();
            $id = input("post.id");
            if($id == null){
                $id = 0;
            }
            $companyid = 0;//Session::get("CompanyID")=0;
            $CityID = 0;//Session::get("CityID")=0;
            $data = array("ParentID"=>$id,"CompanyID"=>$companyid,"CityID"=>$CityID,"IsDelete"=>0);
            $directory = new DirectoryModel();
            $result = $directory->getDirList($data);
           
            $new_result = array();
            foreach($result as $k=>$v){
                $new_result[$k]['id']=$v['ID'];
                $new_result[$k]['pId']=(int)$v['ParentID'];
                $new_result[$k]['name']=$v['FileName'];
                //$new_result[$k]['iconSkin']=$v['css'];
                $new_result[$k]['isParent']=true;//self::isParent($v['id']);
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
     * [ajaxNewFolder 建立文件夹]
     * @return [type] [description]
     * @author cgy
     */
    public function ajaxNewFolder(){
       $id = input("post.id");//文件父ID
       $name = input("post.name");//文件名
       $depart = input("post.depart");
       $directory = input("post.directory");
       $dir = new DirectoryModel();
       $dirpath = $dir->where("ID",$directory)->find();
       if($dirpath == null){
           return json(array("code"=>0,"msg"=>"无法找到父目录"));
       }
       $basePath = $dirpath["Path"];
       $newPath = $basePath . "\\" . $name;
       $data = array();
       $data["FileName"] = $name;
       $data["ParentID"] = $id;
       $data["CityID"] = 0;//Se
       $data["CompanyID"] = 0;
       $data["Type"] = '1';
       $data["DatetimeCreated"] = $name;
       $data["DatetimeUpdated"] = $name;
       $data["Path"] = $basePath;
       $dir->startTrans();
       try{  
           $result = $dir->addFolder($data);
           $dir->commit();
           $mu = DirectoryOption::mkdir($newPath);
           if($mu == null){
               throw new \Exception();
           }
       }catch(\Exception $e){
           // echo "sdf";
             $dir->rollback();
             return json(array("code"=>0,"msg"=>"创建失败"));
         }
         return json(array("code"=>1,"msg"=>"创建成功"));
    }
    //更新文件夹
    public function ajaxUpdateFolder(){
        $id = input("post.id");//文件ID
        $name = input("post.name");//文件名        
        $dir = new DirectoryModel();
        $data = array("FileName"=>$name);
        $result = $dir->updateFolder($data, $id);
        if($result == null){
            return json(array("code"=>0,"msg"=>"更新失败"));
        }else{
            return json(array("code"=>1,"msg"=>"更新成功"));
        }
    }
    //删除文件夹
    public function ajaxDeleFolder(){
        $id = input("post.id");//文件ID
        //$name = input("post.name");//文件名
        $dir = new DirectoryModel();
       // $data = array("FileName"=>$name);
        $result = $dir->deleFolder($id);
        if($result == null){
            return json(array("code"=>0,"msg"=>"删除失败"));
        }else{
            return json(array("code"=>1,"msg"=>"删除成功"));
        }
    }
}

?>