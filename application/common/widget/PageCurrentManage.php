<?php
namespace app\common\widget;
use app\common\widget\callback\WidgetCurrentModalCallback;
use com\lnbei\serialize\LBSerialize;
//|***************************************************************
//|lnbei
//+---------------------------------------------------------------
//|Copyright (c) 2006~2099 http://lnbei.net All rights reserved.
//+---------------------------------------------------------------
//|Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
//+---------------------------------------------------------------
//|@auth zhuoyue(993238441@qq.com)
//+---------------------------------------------------------------
//|当前用户页面编辑管理类
//|***************************************************************
class PageCurrentManage
{
    /**
     *用户编辑页面 
     * @var PageUser
     */
    protected $mPageUser;
    protected $mWidgetCurrentModalCallback;
    public function __construct(WidgetCurrentModalCallback $mWidgetCurrentModalCallback){
        $this->mPageUser = null;
        $this->mWidgetCurrentModalCallback = $mWidgetCurrentModalCallback;
    }
    /**
     * 
     * @param string $userID
     */
    public function getPageUserByID($userID){
        $result = $this->mWidgetCurrentModalCallback->getWidgetFileByUserID(['UserID'=>$userID]);
        if(empty($result)){
            return null;
        }
        $resultData = $result->toArray();
        return self::convertPageUser($resultData);
    }
    /**
     * 转换
     * @param unknown $data
     */
    private function convertPageUser($data){
        if(!empty($data)){
            $pageUser = new PageUser();
            foreach ($data as $key=>$value){
                switch($key){
                    case 'UserID':$pageUser->userID=$value;break;
                    case 'FileName':$pageUser->fileName=$value;break;
                    case 'FileContent':$pageUser->fileContent=$value;break;
                    case 'State':$pageUser->state=$value;break;
                    case 'ID':$pageUser->ID=$value;break;
                }
            }
            return $pageUser;
        }else{
            return null;
        }
    }
    /**
     * 添加用户页面
     */
    public function addPageUser($data){
        $this->mWidgetCurrentModalCallback->addWidgetFileByUserID($data);
    }
    /**
     * 修改数据
     */
    public function updatePageUser($data,$id){
        $this->mWidgetCurrentModalCallback->updateWidgetFileByUserID($data,['ID'=>$id]);
    }
    public function updatePageUserByPageUser(PageUser $m){
        $pageuser = self::objectToArray($m);
        self::updatePageUser($pageuser, $m->ID);
    }
    /**
     * 
     */
    public function getPageUserByPid($pid, $page=1, $pageSize=20){
        return $this->mWidgetCurrentModalCallback->getwidgetFileByPid(["ParentID"=>$pid], $page, $pageSize); 
    }
    /**
     * 对象转数组
     * @param unknown $object
     * @param string $flag
     */
    protected function objectToArray($object,$flag=true){
        $array = array();
        if(is_object($object)){
            foreach ($object as $key=>$value){
                if($flag){
                    $keys = ucfirst($key);
                }else{
                    $keys = $key;
                }
                $array[$keys] = $value;    
            }
        }
        return $array;
    }
    /**
     * 析构函数
     */
    public function __destruct(){

        if(!empty($this->mPageUser)){
            $array = self::objectToArray($this->mPageUser);
            self::updatePageUser($array, $this->mPageUser->ID);
        }
    }

    public function getPageUser($id=1){
        if(empty($this->mPageUser)){
            $this->mPageUser = self::getPageUserByID($id);
        }    
        return empty($this->mPageUser)? new PageUser() : $this->mPageUser ;
    }
    public function setPageUser(PageUser $mPageUser){
        $this->mPageUser = $mPageUser;
    }
    //return page
    public function openFile($id){
        self::getPageUser($id);
        if(empty($this->mPageUser)){
            $page = LBSerialize::unSerialize($this->mPageUser->fileContent);
        }else{
            $page = null;
        }
        return $page;
    }
    
}

?>