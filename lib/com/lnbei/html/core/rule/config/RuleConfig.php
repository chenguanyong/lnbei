<?php
namespace com\lnbei\html\core\rule\config;

class RuleConfig
{
    public static $rule = array(
        "lbedit"=>//规则的名
        [
            "name"=>"edit",//规则名
            "type"=>"0",//规则类型
            "namespace"=>"com\lnbei\html\core\rule\subrule",//类名加空间名
            "isDependent"=>false,//是否继承
            "value"=>["false","true"],//规则可能取的值
            "class"=>"EditRule",//规则处理类
            "handle"=>['1','2'],//规则处理的位置1是在初始化xml模板的时候处理；2是在生产HTML文件的时候
        ],
        "lbchen"=>
        [
            "name"=>"chen",
            "type"=>"0",
            "namespace"=>"com\lnbei\html\core\config\Config",//类名加空间名
            "isDependent"=>true,
            "value"=>[]
        ],
        "lbchen22"=>
        [
            "name"=>"lbchen22",
            "type"=>"0",
            "namespace"=>"com\lnbei\html\core\config\Config",//类名加空间名
            "isDependent"=>true,
            "value"=>[]
        ],
    );
    /**
     * 获取系统配置
     */
    public static function getConfig($key){
        return @self::$rule[$key];
    }
    /**
     * 设置系统配置
     */
    public static function setConfig($key,$value){
        self::$rule[$key] = $value;
    }
}

?>