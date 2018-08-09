<?php
namespace app\web\controller\WebDesign;

use app\web\model\widget\PageModel;
use app\web\model\NavigationModel;
use app\common\controller\WidgetBase;
class Page extends WidgetBase
{
    public function ajaxGetPage(){
       return self::getPageFileByPid();
        exit;
        $id = input("post.id");
        if($id == null){
            $id = 0;
        }
        //var_dump($result);exit;
        $nav = new NavigationModel();
        $result = $nav->getNavByPid($id);
        $new_result = array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['ParentID'];
            $new_result[$k]['name']=$v['Name'];
            // $new_result[$k]['iconSkin']=$v['class'];//drag:false
            if($v['isParent'] == 1){
                $new_result[$k]['isParent']=true;
            }else{
                $new_result[$k]['isParent']=false;
            }
        }
       
        $page = new PageModel();
        $result = $page->getPageByID($id);
        $i = count($new_result);
        foreach($result as $k=>$v){
            $new_result[$i]['id'] = time() . $v['ID'];
            $new_result[$i]['pId']=(int)$v['NavID'];
            $new_result[$i]['name']=$v['Name'];
            $new_result[$i]['isParent']=false;
            $i++;
        }
        
//         var_dump($id);
//         var_dump($new_result);
//         exit;
        
        if(count($new_result) == 0){
            return json_encode($new_result,JSON_UNESCAPED_UNICODE);
        }
        else{
            return json_encode($new_result,JSON_UNESCAPED_UNICODE);
        }
    }
    
    public function getPageFileByPid(){
        $id = input("post.id");
        if($id == null){
            $id = 0;
        }
        $result = $this->pageCurrentManage->getPageUserByPid($id);
        $new_result = array();
        foreach($result as $k=>$v){
           
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['ParentID'];
            $new_result[$k]['name']=$v['FileName'];
            $new_result[$k]['isParent']=true;
        }
        return json_encode($new_result,JSON_UNESCAPED_UNICODE);
    }
    
}

?>