<?php
namespace app\index\controller;
use think\Controller;
use think\File;
use think\Request;
use crop\CropAvatar;
class Upload extends Controller
{

    /*
     * 上传广告图片
     */
    public function uploadAdImage(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/image/adv');
        if($info){
            $res['code']=1;
            $res['name']=$info->getInfo()['name'];
            $res['image_name']=$info->getSaveName();
            $res['msg']="上传成功";
            return json($res);

        }else{
            $res['code']=0;
            $res['msg']=$file->getError();
            return json($res);
        }
    }
    /*
     * 上传图片从管理图片
     */
    public function uploadSPImage(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . config("filePath")['spacePic']);
        if($info){
            $res['code']=1;
            $res['name']=$info->getInfo()['name'];
            $res['image_name']=$info->getSaveName();
            $res['msg']="上传成功";
            return json($res);
    
        }else{
            $res['code']=0;
            $res['msg']=$file->getError();
            return json($res);
        }
    }
    /*
     * 编辑器图片上传接口
     */
    public function uploadImage(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/editor');
        if($info){
            $res['src']="http://www.93admin.com/public/statisc/img/tong.jpg";
            $result=array('code'=>0,'data'=>$res,'msg'=>'上传成功');
          
            return json($result);

        }else{

            $result=array('code'=>-1,'data'=>'','msg'=>$file->getError());

            return json($result);
        }
    }
	//图片上传
    public function upload(){
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/image/article');
       if($info){
           $res['code']=1;
           $res['image_name']=$info->getSaveName();
           $res['name']=$info->getInfo()['name'];
           $res['msg']="上传成功";
           return json($res);
        }else{
           $res['code']=0;
           $res['msg']=$file->getError();
           return json($res);
        }
    }
    //文件上传
    public function uploadFile(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/file/down');
        if($info){

            $res['code']=1;
            $res['file_name']=$info->getFilename();
            $res['file_path']="/upload/file/down/".$info->getSaveName();
            $res['msg']="上传成功";
            return json($res);

        }else{
            $res['code']=0;
            $res['msg']=$file->getError();
            return json($res);
        }
    }

    //会员头像上传
    public function uploadface(){
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/face');
       if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }
    
    //用户头像上传
    public function uploadFaceByCrop(){
        $crop = new CropAvatar(
            isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null,
            isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null,
            isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null,
           APP_ROOT_PATH
            );
        
        $response = array(
            'state'  => 200,
            'message' => $crop -> getMsg(),
            'result' => $crop -> getResult()
        );
        
       return json($response);
        
        
    }

}

?>