<?php
namespace com\lnbei\codebuilder\model;

use com\lnbei\db\Database;
use com\lnbei\codebuilder\ClassAdapter;
use com\lnbei\codebuilder\Config;
use com\lnbei\codebuilder\Builder;
use com\lnbei\codebuilder\classs\Variable;
class CreateModelImp extends Builder implements ModelImp
{
    private $table;
    private $tableInfo;
    private $data;
    /**
     * 类适配器
     * @var ClassAdapter
     */
    private $classAdapter;
    /**
     * 初始化模型类
     * @var unknown
     */
    private $nameSpace;
    /**
     * 表名全称
     * @var string
     */
    private $fullTable;
    /**
     * 数据库名称
     * @var string
     */
    private $dataBase;
    /**
     * 默认类名后缀
     * @var string
     */
    protected $defaultSuffix="Model";
    /**
     * 文件扩展名
     * @var string
     */
    protected $extension = "php";
    /**
     * 构造函数
     * @param string $table
     * @param array $data
     */
    public function __construct($table = '',$data = array()){
        $this->dataBase = Config::$dataArray["db"]["dbname"];
        $this->fullTable = $table;
        $this->data = $data;
        $tempTable = explode("_", $table);
        $this->prefix = $tempTable[0];
        $this->table = $tempTable[1];
        
        parent::__construct($this->table);
        self::init();
    }
    private function init(){
        
        $this->classAdapter = new ClassAdapter($this->data);
        $this->nameSpace = $this->classAdapter->getNameSpace();
       
    }
    /**
     * 创建模型
     */
    public function createModelClass(){
        $class = $this->nameSpace->classArray[0];
        var_dump($class);
        $class->name = $this->table . $this->defaultSuffix;
        $var = new Variable("","");
        $var->accessType = "protected";
        $var->name = "table";
        $var->value = $this->table;
        $class->attr[] = $var;
        $classStr = $this->nameSpace->toString();
        $classPath = self::spellPath();
        return self::saveFile($classPath, $classStr);
    }
    public function createModel($table){
      return self::getTableField($table);
      //return self::createTable($table);
    }
    protected function createTable($table){
        $db = new Database();
        //$db->noQuery($sql);
      echo  $sql = "select COLUMN_NAME,DATA_TYPE,IS_NULLABLE,COLUMN_COMMENT from information_schema.columns where table_name='".$table."' AND TABLE_SCHEMA='" . $this->dataBase . "'";
      return $db->query($sql);
    }
    /**
     * 获取表格字段
     */
    protected function getTableField($table){
        $db = new Database();
       var_dump($db);
       echo $sql = "select COLUMN_NAME,DATA_TYPE,IS_NULLABLE from information_schema.columns where table_name='".$table."' AND TABLE_SCHEMA='" . $this->dataBase . "'";
        $result = $db->query($sql);
        $field = array();
        $fields = array();
        foreach($result as $key=>$value){
            $field[$value["COLUMN_NAME"]] = array("DATA_TYPE"=>$value["DATA_TYPE"],"IS_NULLABLE"=>$value["IS_NULLABLE"]);
        }
        $fields[$table] = $field;
        return $fields;
    }
    /**
     * 向数据库中插入角色数据
     * @param array $role
     */
    protected function insertRole($role){
        $dates = date("Y-m-d H:i:s");
        $db = new Database();
        $sql = "INSERT INTO `phpce_dev`.`ce_menu` ( `MenuName`, `ParentID`, `URL`, `DatetimeCreated`, `DatetimeUpdated`) VALUES ( '论坛', '3', '#web/Auth/index', '" . $dates . "', '" . $dates . "');
        ";
        $result = $db->query($sql);
        
    }

}

?>