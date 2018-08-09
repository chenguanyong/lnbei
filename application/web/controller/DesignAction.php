<?php
//|***************************************************************
//|lnbei
//+---------------------------------------------------------------
//|Copyright (c) 2017~2099 http://lnbei.net All rights reserved.
//+---------------------------------------------------------------
//|Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
//+---------------------------------------------------------------
//|@auth zhuoyue(993238441@qq.com)
//+---------------------------------------------------------------
//|菜单动作控制类
//|***************************************************************

namespace app\web\controller;

use app\common\controller\WidgetBase;
use com\lnbei\serialize\LBSerialize;
use com\lnbei\html\Page;
use app\common\widget\PageUser;
use com\lnbei\html\widget\Widget;
class DesignAction extends WidgetBase
{
    /**
     * 
     * @var Page
     */
    protected $currentPage;//当前页面
    /**
     * 
     * @var PageUser
     */
    protected $currentPageUser;
    protected function _initialize(){
        parent::_initialize();
        $id = $this->__USER->userID;
        $this->currentPageUser = $this->pageCurrentManage->getPageUser($id);
        if(empty($this->currentPage)){
            if(!empty($this->currentPageUser->fileContent)){
                $this->currentPage = LBSerialize::unSerialize($this->currentPageUser->fileContent);
            }
        }
    }
    //首页
    public function index(){
      if(empty($this->currentPageUser->fileContent)){
       $this->currentPage = $this->pageFactory->createPage();
      }else{
       $this->currentPage = LBSerialize::unSerialize($this->currentPageUser->fileContent);  
      }
      $html = $this->currentPage->draw();
      echo $html;
    }
    /**
     * 打开文件
     */
    public function openFile(){
        $id = input("post.id");
        $this->currentPage = $this->pageCurrentManage->openFile($id);
        $this->currentPageUser = $this->pageCurrentManage->getPageUser();
        echo $this->currentPage->draw();
    }
    /**
     * 另存为
     */
    public function saveAs(){
        
    }
    /**
     * 保存文件
     */
    public function save(){
        $this->pageCurrentManage->updatePageUserByPageUser($this->currentPageUser);
    }
    /**
     * 处理输入
     */
    public function doInput(){
       $dataArray= array(""); 
       $id = input("post.id");//
       $pid = input("post.pid");
       $result = $this->currentPage->inputAttrAndCss($id, $pid, $dataArray);
       if($result){
           return json(array("code"=>1,"msg"=>"成功","data"=>$unHtml));
       }else{
           return json(array("code"=>0,"msg"=>"失败","data"=>''));
       }        
    }
    /**
     * 处理输出
     */
    public function doOutput(){
        $dataArray = array("xid"=>"",
            "pid"=>""
        );
        $id = input("post.id");//
        $pid = input("post.pid");
        $html = $this->currentPage->getOutputString($id, $pid);
        $unHtml = urlencode($html);
        return json(array("code"=>1,"msg"=>"成功","data"=>$unHtml));
    }
    /**
     * 析构函数
     */
    public function __destruct(){
        $currentPage = LBSerialize::serialize($this->currentPage);
        $this->currentPageUser->ID = $this->currentPageUser->userID = $this->__USER->userID;
        $this->currentPageUser->fileContent = $currentPage;
        $this->pageCurrentManage->setPageUser($this->currentPageUser);
        $this->pageCurrentManage->__destruct();
    }
    /**
     * 添加控件
     */
    public function addWidget(){
        $id = input("post.id");//
        $pid = input("post.pid");
        $widgetNameCode = input("post.widgetCode");//套件的识别码
        $widgetFactory = $this->pageFactory->getWidgetFactory();
        /**
         * 
         * @var Widget
         */
        $widget = $widgetFactory->getWidget($widgetNameCode);
    
        $this->currentPage->addChildrenWidget($id, $widget);
        $html = $widget->widgetToString();
        //遗留问题是返回的空间父id未处理
        return json(array("code"=>1,"msg"=>"成功","data"=>array("id"=>$id,"pid"=>$pid,"html"=>$html)));
    }
    /**
     * 更新套件
     */
    public function updateWidget(){
        $id = input("post.id");//
        $pid = input("post.pid");
        //$widgetNameCode = input("post.widgetCode");
        $html = $this->currentPage->refreshWidgetByID($id, $pid);//把部分widget转换成套件
        return json(array("code"=>1,"msg"=>"成功","data"=>array("id"=>$id,"pid"=>$pid,"html"=>$html)));
    }
    /**
     * 删除套件
     */
    public function deleWidget(){
        $id = input("post.id");//
        $pid = input("post.pid");
        $result = $this->currentPage->deleWidgetOrTagByID($id);
        if($result){
            return json(array("code"=>1,"msg"=>"成功","data"=>1));
        }else{
            return json(array("code"=>0,"msg"=>"删除失败","data"=>0));
        }
    }
    /**
     * 移动套件
     */
    public function moveWidget(){
        $toID = input("post.toID");//
        $toPID = input("post.toPid");
        $fromID = input("post.fromID");//
        $fromPID = input("post.fromPid");
        $result = $this->currentPage->moveTag($toID, $toPID, $fromID, $fromPID);
        if($result){
            return json(array("code"=>1,"msg"=>"成功","data"=>array("id"=>$toID,"pid"=>$toPID,"html"=>"")));
        }else{
            return json(array("code"=>0,"msg"=>"删除失败","data"=>null));
        }
    }
    /**
     * 粘贴套件
     */
    public function pasteWidget(){
        $toID = input("post.toID");//
        $toPID = input("post.toPid");
        $fromID = input("post.fromID");//
        $fromPID = input("post.fromPid");
        $result = $this->currentPage->pasteWidget($toID, $toPID, $fromID, $fromPID);
        if($result){
            return json(array("code"=>1,"msg"=>"成功","data"=>array("id"=>$toID,"pid"=>$toPID,"html"=>"")));
        }else{
            return json(array("code"=>0,"msg"=>"删除失败","data"=>null));
        }
    }
}

?>