<?php
namespace app\web\controller\WebDesign;

use app\web\model\WidgetModel;
use com\lnbei\html\widgettool\WidgetList;
use app\common\controller\WidgetBase;
use app\common\controller\Base;
class Widget extends WidgetBase
{
    public function index(){
        
       return $this->fetch("index"); 
    }
    public function ajaxGetWidget(){
        return self::getWidgetLists();
        $flag = input("flag");
        $id = input("post.id");
        $id = $id == null? 1:$id;
        $widget = new WidgetModel();
        $resultWidget = null;
        if($flag == null){
            $resultWidget = $widget->getWidgitByID($id);
        }else{
            $resultWidget = $widget->getWidgitByIDAndFlag($id,$flag);
        }
        
        if(count($resultWidget) == 0){
            return json_encode(array("code"=>0,"msg"=>"获取控件列表失败"));
        }
        $result = array();
        foreach($resultWidget as $k=>$value){
            $result[$k]["id"] = $value["ID"];
            $result[$k]["pId"] = $value["ParentID"];
            $result[$k]["name"] = $value["Name"];
            $result[$k]["drop"] = false;
            if($value["Flag"] == 0){
                $result[$k]['isParent']=true;
            }else{
                $result[$k]['isParent']=false;
            }
        }
        if(count($result)==0){
            return json();            
        }else{
            return json_encode($result,JSON_UNESCAPED_UNICODE);
        }
    }
    //
    public function getWidgetList(){
        //获取请求参数
        $query_data = input("get.");
        $widget = new WidgetModel();
        $where = array("IsDelete"=>0);
        //$where["State"] = 1;
//         if($query_data["cp"] != null){
//             $where["CompanyID"] = $query_data["cp"];
//         }else{
//             $where["CompanyID"] = Session::get("companyID");
//         }
//         if($query_data["ct"] != null){
//             $where["CityID"] = $query_data["ct"];
//         }else{
//             $where["CityID"] = Session::get("CityID");
//         }
        if(isset($query_data["keyword"])&& $query_data["keyword"] != null){
            $where["Name"] = array("like","'%". $query_data["keyword"]."%'");
        }
        $where["Flag"] = 1;
        // var_dump($where);
        $result = $widget->getWidgit($where,$query_data['iDisplayStart'],$query_data['iDisplayLength']);
        $count = $widget->getWidgitCount($where,$query_data['iDisplayStart'],$query_data['iDisplayLength']);
        if($result == null){
            return json(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0]);
        }
        return json(['draw'=>$query_data['sEcho'],'recordsTotal'=>$count,'recordsFiltered'=>$count,'data'=>$result]);
    }
    /**
     * 获取控件列表.从配置文件中获取
     */
    public function getWidgetLists(){
        $flag = input("flag");
        $id = input("post.id");
        $id = $id == null? 0:$id;
        $widgetList = new WidgetList();
        $resultList = $widgetList->getWidgetListByPid($id);
        if(count($resultList) == 0){
            return json_encode(array("code"=>0,"msg"=>"获取控件列表失败"));
        }
        $result = array();
        $i=0;
        foreach($resultList as $k=>$value){
            $result[$i]["id"] = $value["xid"];
            $result[$i]["pId"] = $value["xpid"];
            if(!empty($value["attr"]['name'])){
                $result[$i]["name"] = $value["attr"]['name'];
            }else if(!empty($value['name'])){
                $result[$i]["name"] = $value['name'];
            }else{
                $result[$i]["name"] = $value['content'];
            }
            $result[$i]['isParent']=$value["isparent"];
            if($value["isparent"] == false){
                $result[$i]["drag"] = true;
            }else{
                $result[$i]["drag"] = false;
            }
            $i++;
        }
        if(count($result)==0){
            return json();            
        }else{
            return json_encode($result,JSON_UNESCAPED_UNICODE);
        }
    }
}

?>