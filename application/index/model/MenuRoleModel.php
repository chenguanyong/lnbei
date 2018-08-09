<?php
namespace app\index\model;
use think\Model;
class MenuRoleModel extends Model
{
    protected  $table = 'ce_menu_role';
    public function initialize(){
    
        parent::initialize();
    }
}

?>