<?php
namespace app\index\controller;
use think\controller;
use think\Session;
use think\Request;
use app\common\controller\Base;
use lib\html\tag\input;
use app\index\model\MenuModel;
use lib\html\BuildMenuHtml;
use think\Cache;

class Menu extends Base
{
    public function index()
    { 
        return $this->fetch('menu'); //$password;
    }
    
    //通过父id获取菜单
    public function getMenu(){
        
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
        $menudata = new MenuModel();
        $ParentID =$query_data['id'];
        $result = $menudata->getMenuParentID($ParentID);
        return json_encode($result,JSON_UNESCAPED_UNICODE);
    }
    //获取菜单
    public function getMenuInfo(){
        $id = input("menuID");
        $menudata = new MenuModel();
        $menuinfo = $menudata ->getData(['ID'=>$id]);
        if($menuinfo == null){
            return json(["code"=>0,"msg"=>"没有该数据"]);
        }else{
            return json(["code"=>1,"msg"=>"成功","data"=>$menuinfo]);            
        }
    }
   /**
     * [add 添加菜单ajax]
     * @return [type] [description]
     * @author
     */
    public function add(){
        if(request()->isAjax()){
            $key = input("post.");
           
            if(!is_array($key)){
               return json_encode(array("code"=>0,"msg"=>"参数无效"),JSON_UNESCAPED_UNICODE);
            }
            $param = array();
            foreach ($key as $keys=>$value){
                if($value != ""){
                    $param[$keys] = $value;
                }
            }
            $menu = new MenuModel();
            $result = $menu->addMenu($key);
            if($result == null){
                return json_encode(array("code"=>0,"msg"=>"添加菜单失败"),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(array("code"=>1,"msg"=>"添加菜单成功"),JSON_UNESCAPED_UNICODE);
            }
        }else{
           return $this->fetch("index");
        }
    }
   /**
     * [dele 删除菜单]
     * @return [type] [description]
     * @author
     */
    public function dele(){
        if(request()->isAjax()){
            $key = input("post.");
            if($key == 0){
                return json_encode(array("code"=>0,"msg"=>"参数无效"),JSON_UNESCAPED_UNICODE);
            }
            $menu = new MenuModel();
            $result = $menu->deleMenu($key);//删除菜单
            if($result == null){
                return json_encode(array("code"=>0,"msg"=>"添加菜单失败"),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(array("code"=>1,"msg"=>"添加菜单成功"),JSON_UNESCAPED_UNICODE);
            }
        }else{
            return $this->fetch("index");
        }
    }
    /**
     * [update 更新菜单]
     * @return [type] [description]
     * @author
     */
    public function update(){
        if(request()->isAjax()){
            $where = array();
            $key = input("post.");
            //var_dump($key);
            if(!is_array($key)){
                return json_encode(array("code"=>0,"msg"=>"参数无效"),JSON_UNESCAPED_UNICODE);
            }
            foreach ($key as $keys => $value){
                if($value != ""){
                    $where[$keys]=$value;
                }
            }
            $menu = new MenuModel();
            $id= 0;
            $id = $key['id'];
            //unset($key['id']);
            $result = $menu->updateMenu($where,$id);//删除菜单
            if($result == null){
                return json_encode(array("code"=>0,"msg"=>"添加菜单失败"),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(array("code"=>1,"msg"=>"添加菜单成功"),JSON_UNESCAPED_UNICODE);
            }
        }else{
            return $this->fetch("index");
        }       
    }
    /**
     * [ajaxGetMenu 获取菜单]
     * @return [type] [description]
     * @author
     */
    public function ajaxGetMenu(){
        $where = array();
        if(request()->isAjax()){
          $roleID = Session::get("RoleID"); 
          $userID = Session::get("UserID");
          if($roleID == null){
              return json_encode(array("code"=>0,"msg"=>"获取角色ID失败"),JSON_UNESCAPED_UNICODE);
          }
          $companyID = input('companyID');
          if(!is_numeric($companyID)){
              return json_encode(array("code"=>0,"msg"=>"输入公司ID无效"),JSON_UNESCAPED_UNICODE);
          }else{
              $where["companyID"] = $companyID;
          }
          $cityID = input('cityID');
          if(!is_numeric($cityID)){
              return json_encode(array("code"=>0,"msg"=>"输入城市ID无效"),JSON_UNESCAPED_UNICODE);
          }else{
              $where["cityID"] = $cityID;
          }
          $cache = Cache::get("CACHE_MENU_". $cityID . "_" . $companyID . "_" . $userID);
          if(!empty($cache)){
              
             // return $cache;
          }
          $menu = new MenuModel();
          $where["IsDelete"]=0;
         // var_dump($where);
         /// echo $roleID. "dd";
          //echo $userID;
         // exit;
          $result = $menu->getMenuList($roleID, $where, $userID);
           // var_dump($result);
           // exit;
          if($result == null){
              return json_encode(array("code"=>0,"msg"=>"抱歉没有数据"),JSON_UNESCAPED_UNICODE);
          }
          $data = array();
          $datapc = array();
          $back_data_array = array();
          foreach ($result["data"] as $row){
              $arr = array($row['ID'],$row['ParentID'],'title'=>$row['MenuName'],'URL'=>$row['URL'],'css'=>$row['URL'],'IsDelete'=>$row['css']);
              $back_data_array['' . $row['ParentID']][] = $arr;
          }
         // var_dump($back_data_array);
          $buildMenuhtml = new \com\lnbei\html\BuildMenuHtml($back_data_array);
          $meunhtml = $buildMenuhtml->getData();
          $f = count($meunhtml);
          for ($i = $f-1; $i>=0;$i--){
              $temp = array();
              $temp[]=array('title'=>$meunhtml[$i]['title'],'css'=>$meunhtml[$i]['css']);
              $temp[]=array('title'=>$meunhtml[$i]['URL'],'css'=>$meunhtml[$i]['css']);
              $temp[]=array('title'=>$meunhtml[$i]['css'],'css'=>$meunhtml[$i]['css']);
              $temp[]=array('title'=>$meunhtml[$i]['IsDelete'],'css'=>$meunhtml[$i]['css']);
              $data[]=$temp;
              $datapctemp = array("data_id"=>$meunhtml[$i][0],"data_pid"=>$meunhtml[$i][1]);
              $datapc[] = $datapctemp; 
           }  
            $result_json = json_encode(array("code"=>1,"msg"=>"成功","data"=>$data,"datapc"=>$datapc),JSON_UNESCAPED_UNICODE);
            Cache::set("CACHE_MENU_". $cityID . "_" . $companyID . "_" . $userID ,$result_json);
            return  $result_json;
        }else{
            return  json_encode(array("code"=>0,"msg"=>"不是ajax请求"),JSON_UNESCAPED_UNICODE);
        }
        
    }
    /**
     * [ajaxGetMenu 获取子菜单]
     * @return [type] [description]
     * @author
     */
    public function ajaxGetChildMenu(){
        
        if(request()->isAjax()){
            $roleID = Session::get("RoleID");
            if($roleID == null){
                return json_encode(array("code"=>0,"msg"=>"获取角色ID失败"),JSON_UNESCAPED_UNICODE);
            }
            $id = input('post.id');
            if(!is_numeric($id)){
                return json_encode(array("code"=>0,"msg"=>"输入id无效"),JSON_UNESCAPED_UNICODE);
            }
            $menu = new MenuModel();
            $map = array("ce_menu.IsDelete"=>0);
            $result = $menu ->getChildMenuByID($roleID, $id);
            if($result == null){
                return json_encode(array("code"=>0,"msg"=>"抱歉没有数据"),JSON_UNESCAPED_UNICODE);
            }
            $data = array();
            $datapc = array();
            foreach($result as $value){
                $temp = array();
                $temp[]=array('title'=>$value['MenuName'],'css'=>$value['css']);
                $temp[]=array('title'=>$value['URL'],'css'=>$value['css']);
                $temp[]=array('title'=>$value['css'],'css'=>$value['css']);
                $temp[]=array('title'=>$value['IsDelete'],'css'=>$value['css']);
                $data[]=$temp;
                $datapctemp = array("data_id"=>$value['MenuID'],"data_pid"=>$value['ParentID']);
                $datapc = $datapctemp;
            }
            return  json_encode(array("code"=>1,"msg"=>"成功","data"=>$data,"datapc"=>$datapc),JSON_UNESCAPED_UNICODE);
        }else{
            return  json_encode(array("code"=>0,"msg"=>"不是ajax请求"),JSON_UNESCAPED_UNICODE);
        }
    }
    
    /*
     * 获取规则树
     */
    public function getRuleList(){
        
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
            
           $menuRule = new MenuModel(); 
           $result = $menuRule->getRuleTree($id, ['companyID'=>$companyID,"cityID"=>$cityID], Session::get("RoleID"), Session::get("UserID")) ;
           if($result == null){
               return json(["code"=>"0","msg"=>"无结果"]);
           }
           $new_result = array();
           foreach($result['data'] as $k=>$v){
               $new_result[$k]['id']=$v['ID'];
               $new_result[$k]['pId']=(int)$v['parentID'];
               $new_result[$k]['name']=$v['name'];
               //$new_result[$k]['iconSkin']=$v['css'];checked:true
               $new_result[$k]['isParent']=self::IsMenuParent($v['ID']);
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
    private function IsMenuParent($pid){
        $result = Db::name('menu')->where("ParentID",$pid)->count();
        if($result > 0){
            return true;
        }else{
            return false;
        }
    }
}


?>