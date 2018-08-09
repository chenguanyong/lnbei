<?php
namespace com\lnbei\html\core\rule;
use com\lnbei\html\core\data\ContentIteratorCallback;
use com\lnbei\html\core\data\ContentIterator;
use com\lnbei\html\core\rule\config\RuleConfig;
/**
 * 处理xml中规则
 * @author Administrator
 *
 */
class Rule implements RuleImp,ContentIteratorCallback
{
    /**
     * 原始规则列表
     * @var Array
     */
    private $ruleArray;
    /**
     * 关键字列表
     * @var Array
     */
    private $keyword;
    /**
     * 规则动作管理器
     * @var RuleActionManage
     */
    private $ruleActionManage;
    /**
     * 
     * @var array
     */
    private $ruleArrays;

    public function __construct(array $rules,$flag=true){
        $this->ruleArray = $rules;
        $this->keyword = RuleConfig::$rule;
        $this->ruleActionManage = new RuleActionManage();
        $this->ruleArrays = array();
        if($flag){
           self::init();
        }
    }
    /**
     * 获取规则数据
     */
    public function getRuleArray(){
        return $this->ruleArray;
    }
    /**
     * 已废弃
     */
    private function __qinit(){
        $keys = array_keys($this->ruleArray);
        $content = new ContentIterator($this->ruleArray);
        $content ->runIteration($this,$keys[0]);
    }
    //
    public function var_dumps(){
        var_dump($this->ruleArray);
    }
    /**
     * 初始化函数
     * 
     */
    private function init(){
        foreach ($this->ruleArray as $key=>$value){
            foreach ($value as $k=>$v){
                if(!empty($this->ruleArray[$k])){
                    self::tempMerge($this->ruleArray[$k],$k, $v);
                }else{
                    $temp = self::getRuleById($key);
                    self::tempMerge1($v,$key,$k, $temp);
                }
            }
        }
    }
    /**
     * 合并数组
     * @param unknown $startArray
     * @param unknown $endArray
     */
    private function tempMerge($startArray,$ok,$endArray){
        foreach ($startArray as $key=>$value){
           
            foreach ($endArray as $k=>$v){
                  if(empty($startArray[$key][$k])){
                      if(self::checkRule($k)){
                        $this->ruleArray[$ok][$key][$k] = $v;
                      } 
                  }                
            }
        }
    }
    /**
     * 合并数组
     * @param array $startArray
     * @param string $k1
     * @param string $k2
     * @param array $endArray
     */
    private function tempMerge1($startArray,$k1,$k2,$endArray){
        if(empty($endArray)){
            return null;
        }
        foreach ($endArray as $k=>$v){
            if(empty($startArray[$k])){
                if(self::checkRule($k)){
                    $this->ruleArray[$k1][$k2][$k] = $v;
                }
            }
        }
    }
    
    /**
     * 选择规则,返回规则对象
     * @param string $rule
     * @return Object
     */
    public function selectAction($rule){
        if(!empty($this->keyword[$rule])){
            return $obj = $this->ruleActionManage->getRuleAction($tRule['edit']);
        }else{
            return false;  
        }
    }
    /**
     *  已废弃
     * @param array $tagobj
     * @param string $tags
     * @param boolean $bool
     */
    public function callback($tagobj,$tags,$bool){
       $this->ruleArrays[$tagobj['LBid']]=array();
       foreach ($tagobj as $key=>$value){
          //$this->ruleArray[$tagobj['LBid']][$key]=$value;
          if(empty($this->ruleArrays[$tagobj['LBid']][$key])&&$bool){
              $this->ruleArrays[$tagobj['LBid']][$key]=$value;
          }else if(empty($this->ruleArrays[$tagobj['LBid']][$key])&&!$bool){
              if(!self::checkRule($key)){
                  $this->ruleArrays[$tagobj['LBid']][$key]=$value;
              }
          }else{
              $this->ruleArrays[$tagobj['LBid']][$key]=$value;
          }
       }
       return $tags;
    }
    /**
     * 检测规则是否依赖父级
     * @param unknown $key
     * @return boolean|mixed
     */
    private function checkRule($key){
        $tempArray = @$this->keyword[$key];
        if(empty($tempArray['isDependent'])){
            return $tempArray['isDependent']=false;
        }else{
            return $tempArray['isDependent'];
        }
    }
    
    /**
     * 删除规则
     * @param int $pid
     * @param int $id
     */
    public function deleRule($pid, $id){
        
        unset($this->ruleArray[$pid][$id]);
    }
    /**
     * 添加规则
     * @param array $ruleArray
     */
    public function addRuleArray($ruleArray){
        $this->ruleArray = array_merge($this->ruleArray, $ruleArray);
        self::init();
    }
    /**
     * 刷新
     */
    public function refresh(){
        self::init();
    }
    /**
     * 根据id找规则
     */
    public function getRuleById($id,$pid=''){
        
        if(!empty($pid)){
            return @$this->ruleArray[$pid][$id];
        }
        foreach ($this->ruleArray as $key=>$value){
            
            foreach($value as $k=>$v){
                
                if($id == $k){
                    return $v;
                }
            }
        }
    }
    /**
     *设置规则数组 
     * @param array $ruleArray
     */
    public function setRuleArray($ruleArray){
        $this->ruleArray = $ruleArray;
    }
}

?>