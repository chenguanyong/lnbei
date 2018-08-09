<?php
namespace app\index\controller;
use think\controller;
use think\Session;
use think\Request;
use app\common\controller\Base;
use app\index\model\ImageModel;

class Image extends Base
{
    public function index(){

        return $this->fetch('index');
    }
    //获取图片列表
    public function getImageList(){
        $type = input("get.type");//类型
        $companyID = input("get.companyID");//公司ID
        $cityID = input("get.cityID");//城市ID
        $keyword = input("get.keyword");//关键字
        $page = input("get.page");//页数
        $rownum = input("get.num");//数量
        $picdir = input("get.dirID");//目录ID
        if($companyID == null){
            $companyID=0;
        }
        if($cityID == null){
            $cityID=0;
        }

        if($page == null){
            $page=1;
        }
        if($rownum == null){
            $rownum=10;
        }
        //$where = array("CompanyID"=>$companyID,"CityID"=>$cityID,"keyword"=>$keyword);
        //$where["type"]=$type;
        $where = "ce_directory.CompanyID=" . $companyID . " AND ce_directory.CityID=" . $cityID;
        if($type != null){
            $where = $where . " AND ce_image.Type=" . $type;
        }else if($keyword != null){
            $where = $where . " AND ce_image.ImageName like %" . $keyword ."%";
        }
        $image = new ImageModel();
        $count = $image->getImageCount($where);
        $result = $image->getImageList($where, $page, $rownum);
        $this->assign("Image",$result);//图片数据
        $this->assign("count",ceil($count/$rownum));//数量
        $this->assign("companyid",$companyID);//公司ID
        $this->assign("cityID",$cityID);//城市ID
        $this->assign("page",$page);//城市ID
        if($keyword == null){
            $keyword == "null";
        }
        if($type == null){
            $type == "null";
        }
        $this->assign("keyword",$keyword);//关键字
        $this->assign("type",$type);//类型
        return $this->fetch("list");
    }
    //添加图片
    public function addImage(){
        if(request()->isAjax()){
            $imagedata = input("post.");
            if($imagedata == null){
                return json(array("code"=>0,"msg"=>"参数无效"));
            }
            $image = new ImageModel();
            $result = $image->addImage($imagedata);
            if($result == null){
                return json(array("code"=>0,"msg"=>"添加失败"));
            }else{
                return json(array("code"=>1,"msg"=>"添加成功"));
            }
        }
    }
    //删除图片
    public function deleImage(){
        if(request()->isAjax()){
            $id = input("post.id");
            if($id == null){
                return json(array("code"=>0,"msg"=>"参数无效"));
            }
            $image = new ImageModel();
            $result = $image->deleImage($id);
            if($result == null){
                return json(array("code"=>0,"msg"=>"删除失败"));
            }else{
                return json(array("code"=>1,"msg"=>"删除成功"));
            }
        }
    }
    //更新图片
    public function updateImage(){
        if(request()->isAjax()){
            $imagedata = input("post.");
            if($imagedata == null){
                return json(array("code"=>0,"msg"=>"参数无效"));
            }
            $data = array();
            $id = $imagedata["id"];
            foreach ($data as $key=>$value){
                if($value != ""){
                    $data[$key] = $value;
                }
            }
            $image = new ImageModel();
            $result = $image->updateImage($imagedata, $id);
            if($result == null){
                return json(array("code"=>0,"msg"=>"更新失败"));
            }else{
                return json(array("code"=>1,"msg"=>"更新成功"));
            }
        }  
    }
    //移动目录
    public function moveDir(){
        if(request()->isAjax()){
           $imageID = input("post.id");
           $imageDirID= input("post.dirID");
            if($imageID == null || $imageDirID == null){
                return  json(array("code"=>0,"msg"=>"数据无效"));  
            }
            $image = new ImageModel();
            $result = $image->update(['FileID' => $imageDirID,'ID'=>$imageID]);
            if($result == null){
                return json(array("code"=>0,"msg"=>"移动失败"));
            }else{
                return json(array("code"=>1,"msg"=>"移动成功"));
            }
        }else{
            return json(array("code"=>0,"msg"=>"数据无效"));
        }        
    }
    //重名图片
    public function renameImage(){
        if(request()->isAjax()){
            $imageID = input("post.id");
            $ImageName= input("post.ImageName");
            if($imageID == null || $ImageName == null){
                return  json(array("code"=>0,"msg"=>"数据无效"));
            }
            $image = new ImageModel();
            $result = $image->update(['ImageName' => $ImageName,'ID'=>$imageID]);
            if($result == null){
                return json(array("code"=>0,"msg"=>"重命名失败"));
            }else{
                return json(array("code"=>1,"msg"=>"重命名成功"));
            }
        }else{
            return json(array("code"=>0,"msg"=>"数据无效"));
        }
    }
    //批量添加图片
    public function addImages(){
        if(request()->isAjax()){
            $imagedirID = input("post.dirID");
            $imageData = input("post.data");
            if($imagedirID == null || $imageData==null){
                return json(array("code"=>0,"msg"=>"参数无效"));
            }
            $small = str_replace('\\','/',(string)$imageData);
            $data = json_decode($small);
            $datas = array();
            $imageRoot = config("filePath")['spacePic'];
            foreach ($data as $key=>$value){
                if($value ->imgName != ""){
                    $datas[$key] = array("ImageName"=>$value->imgName,
                        "Path"=>$imageRoot . '/' . $value->imgNamePath,
                        "URL"=>$imageRoot . '/' . $value->imgNamePath,
                        "FileID"=>$imagedirID,
                        "Type"=>explode("/", $value->type)[1],
                        "UserID"=>Session("userid"));
                }
            }
            $image = new ImageModel();
            $result = $image->addImages($datas);
            if($result == null){
                return json(array("code"=>0,"msg"=>"添加失败"));
            }else{
                return json(array("code"=>1,"msg"=>"添加成功"));
            }
        }
    }
}

?>