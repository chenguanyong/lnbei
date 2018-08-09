<?php
namespace com\lnbei\html\core\data\db;

use com\lnbei\html\core\config\Config;
class TableDb
{
    /**
     * 
     * @var Drive $db
     */
    private $db;
    
    public function __construct(){
       if(Config::$confArray['db']['drive'] == 'think'){
           $this->db = new ThinkDB($table);
       }else if(Config::$confArray['db']['drive'] == 'auto'){
           
       }else{
           
       } 
    }
    /**
     * 获取数据库内表的列表
     */
    public function getTableList(){
        $sql = "select TABLE_NAME from information_schema.tables WHERE TABLE_SCHEMA='".$this->db->getDatabase()."'";
        return $this->db->query($sql);
    }
    /**
     * 获取数据库表字段
     * @param string $table
     */
    public function getTableField($table){
        $sql = "select COLUMN_NAME,DATA_TYPE,IS_NULLABLE from information_schema.columns where table_name='".$table."' AND TABLE_SCHEMA='".$this->db->getDatabase()."';";
        return $this->db->query($sql);
    }
}

?>