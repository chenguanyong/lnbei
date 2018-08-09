<?php
namespace app\index\model;
use \think\Model;
use think\Db;
use app\index\model\AuthModel;
class MenuModel extends Model
{   
    protected $table = 'ce_menu';
    //初始化
    public function initialize(){
    
        parent::initialize();
    }
    
    //获取数据
    public function getMenuDatas($roleID){
        
        $this->menuRole();
        
    }
    //获取菜单数据
    public static  function getMenuData($roleID,$dele = 0,$flag = 0){
        
        $back_data_array = array();
        
        $sql = 'SELECT DISTINCT ';
        $sql = $sql . '	menu.ID AS ID, ';
        $sql = $sql . '	menu.MenuName AS MenuName, ';
        $sql = $sql . '	menu.ParentID AS ParentID, ';
        $sql = $sql . '	menu.Flag AS Flag, ';
        $sql = $sql . '	menu.URL AS URL ';
        $sql = $sql . 'FROM ';
        $sql = $sql . '	ce_menu AS menu, ';
        $sql = $sql . '	ce_menu_role AS menu_role ';
        $sql = $sql . 'WHERE ';
        $sql = $sql . '	menu.ID = menu_role.MenuID ';
        $sql = $sql . 'AND menu_role.IsDelete = 0 ';
    	$sql = $sql . 'AND menu.IsDelete =' . $dele . ' ';
    	$sql = $sql . 'AND menu.Flag =' . $flag . ' ';
    	$sql = $sql . 'AND menu_role.RoleID =' . $roleID . ' ';    	
    	$sql = $sql . 'Order by ';
    	$sql = $sql . 'menu.ID ASC  ';
        $result = Db::query($sql);
        if(count($result) == 0){
            return false;
        }
        foreach ($result as $row){
            $arr = array($row['ID'],$row['ParentID'],'title'=>$row['MenuName'],'url'=>$row['URL'],'flag'=>$row['Flag']);
            $back_data_array['' . $row['ParentID']][] = $arr;
        }
        return $back_data_array;
    }
    //获取彩单
    public function getMenuParentID($ParentID){
        
        //$menu = $this->get(['ParentID'=$ParentID]);
        $result_array = array();
        $sql = 'SELECT ';
        $sql = $sql . '	c.*, ';
        $sql = $sql . '	(';
        $sql = $sql . '		SELECT';
        $sql = $sql . '			COUNT(*) ';
        $sql = $sql . '		FROM ';
        $sql = $sql . '			ce_menu c2 ';
        $sql = $sql . '		WHERE ';
        $sql = $sql . '			c2.ParentID = c.ID ';
        $sql = $sql . '	) AS child_count ';
        $sql = $sql . 'FROM ';
        $sql = $sql . '	ce_menu c ';
        $sql = $sql . 'WHERE ';
        $sql = $sql . '	c.ParentID = ' . $ParentID;
      //echo $sql;
      //exit;
        $result = Db::query($sql);
        //var_dump($result);
        if(count($result) == 0){
        
            return false;
        } 
        $data = array();
        foreach($result as $row){
            //echo 'ddd';
            $item = array(
                'text' => $row['MenuName'] ,
                'type' => $row['child_count'] > 0 ? 'folder' : 'item',
                'additionalParameters' =>  array('id' => $row['ID'])
            );
            if($row['child_count'] > 0)
                $item['additionalParameters']['children'] = true;
                else {
                    //we randomly make some items pre-selected for demonstration only
                    //in your app you can set $item['additionalParameters']['item-selected'] = true
                    //for those items that have been previously selected and saved and you want to show them to user again
                    if(mt_rand(0, 3) == 0)
                        $item['additionalParameters']['item-selected'] = true;
                }
            
                $data[$row['ID']] = $item;
                //var_dump($data);
        }
        if(count($data) != 0){
            
            $result_array['status'] = 'OK';
            $result_array['data'] = $data;
    
        }else{
            $result_array['status'] = 'ERR';
            $result_array['message'] = '数据库错误';
        }
        return $result_array;
    }
    
    //添加菜单
    public function addMenu($Menudata){
        
       $menu = $this->where(["MenuName"=>$Menudata["MenuName"]])->find();
       
       if(!empty($menu)){
           return null;
       }
       unset($Menudata['node']);
       return $result = $this->save($Menudata);
       
    }
    
    //删除菜单
    public function deleMenu($meunID){
        
        return $this->save(['IsDelete'=>1],['ID'=>$meunID]);
        
    }
    
    public function updateMenu($menudata,$menuID){
        
        $result = $this->where(['MenuName'=>$menudata['MenuName']])->find();
      // var_dump($result);
        if($result == null){
            
            return null;
        }
        return $this->save($menudata,['ID'=>$menuID]);
    }
    /**
     * [getMenuByID 获取菜单]
     * @return [type] [description]
     * @author
     */
    public function getMenuByID($roleID,$id,$map,$Nowpage,$limits){
        
        $result = $this->field('ce_menu.*')->join('ce_menu_role', 'ce_menu.ID = ce_menu_role.MenuID')
            ->where($map)->page($Nowpage, $limits)->order('ID asc')->select();
        $rownum = $this->join('ce_menu_role', 'ce_menu.ID = ce_menu_role.MenuID')
            ->where($map)->count();
        if($rownum == 0){
            return null;
        }
        return array("data"=>$result,"count"=>$rownum);
    } 
    /**
     * [getChildMenuByID 获取子菜单]
     * @return [type] [description]
     * @author
     */
    public function getChildMenuByID($roleID,$id){
    
        $result = $this->field('ce_menu.*')->join('ce_menu_role', 'ce_menu.ID = ce_menu_role.MenuID')
        ->where(["IsDelete"=>0,"ce_menu_role.RoleID"=>$roleID,"ce_menu.ParentID"=>$id])->select();
        if($result == 0){
            return null;
        }
        return $result;
    }
    /**
     * [getMenuList 获取菜单]
     * @return [type] [description]
     * @author
     */
    public function getMenuList($roleID,$map,$userid){
        $auth = new AuthModel();
        //var_dump($map);
        $rule = $auth->getAuthList($map['companyID'], $map['cityID'], $roleID,$userid);
       // echo $rule;
        $rule == -1 ? "" : $map['ID'] = ["IN",$rule];
        $result = $this->where($map)->select();
        if($result == NULL){
            return null;
        }
        return array("data"=>$result,"count"=>0);
    }
    /**
     * 获取规则树
     */
    public function getRuleTree($id,$map, $roleID, $userID){
        $rule = new RuleModel();
        $ruleList = $rule->getRule($map, $roleID, $userID);
        $menu = array();
        $rule == -1 ? "" : $menu['ID'] = ["IN",$rule];
        $menu['ParentID'] = $id;
        $result = $this->where($id)->select();
        if($result == null){
            return null;
        }
        return ["data"=>$result,"rule"=>$rule];
    }

}

?>