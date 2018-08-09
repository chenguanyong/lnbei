<?php
namespace com\lnbei\html\core\rule;
use com\lnbei\html\core\config\Config;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\core\rule\config\RuleConfig;

/**
 * 管理规则动作类
 * @author Administrator
 *
 */
class RuleActionManage
{
    /**
     * 获取规则动作对象
     * @param string $rule
     */
    private $ruleActionArray ;
   
    public function __construct($flag = false){
       if($flag){
         self::init();
       }
    }
    /**
     * 初始化函数
     */
    private function init(){
        $tempRule = array();
        $tempKeyword = RuleConfig::$rule;
        foreach ($tempKeyword as $key=>$value){
            $tempRule[] = $value['namespace'];
        }
        $this->ruleActionArray = $tempRule;
        //spl_autoload_register(loader);
        self::loader();
    }
    /**
     * 装载规则动作类
     * @throws \Exception
     */
    private function loader(){
        $tempPath = Config::$confArray['NAMESPACEDIR'];
        foreach ($this->ruleActionArray as $key=>$value){
            $tempPakage = $value;
            $tempPakage = str_replace("/","\\",$tempPakage);
            $path = $tempPath."".$tempPakage."".".php";
            if(is_file($path)){
                require_once $path;
            }else{
                throw new \Exception($path);
            }
        }
    }
    /**
     * 获取规则对应动作的对象
     * @param string $rule
     */
    public function getRuleAction($rule){
        $className = $rule . "RuleAction";
        return new $className;
    }
    /**
     * 动态注册规则动作
     * @param string $ruleArray
     */
    public function registerRuleAction($ruleArray){
        
        RuleConfig::$rule = array_merge(RuleConfig::$rule,$ruleArray);
        $classPath = DirErgodic::ergodics(config::$confArray["ROOTPATH"],$ruleArray['name']."RuleAction.php");
        if(!is_file($classPath[1])){
           throw new \Exception("找不到$className类"); 
        }else{
          //echo  $class_name = str_replace("/","\\", $classPath[1]);
            require_once $classPath[1];
        }
       
//         $class = new \ReflectionClass($className);
//         var_dump($class);
//         //$instance = $class->newInstanceArgs();
//         $fileName = $class->getFileName();
//         var_dump($fileName);
//         exit();
//         $className = trim(str_replace("RuleAction", "", $className));
//         if(is_file($fileName)){
//             Config::$confArray['keyword'][$className] = [
//                 "name"=>$class
//             ];
//             require_once $fileName;
//         }else{
//             return false;
//         }
    }

}

?>