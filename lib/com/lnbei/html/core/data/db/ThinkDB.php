<?php
namespace com\lnbei\html\core\data\db;

use think\Db;
use com\lnbei\html\core\config\Config;
class ThinkDB implements Drive
{
    private $table;
    private $database;
    public function __construct(){
        $this->table = '';
        $this->database = Config::$confArray["db"]['database'];
    }
    /**
     * 
     * @param string $database
     */
    public function setDatabase($database){
        $this->database = $database;
    }
    /**
     * 
     */
    public function getDatabase(){
        return $this->database;
    }

    /**
     * 获取表格名称
     */
    public function getTable(){
        return $this->table;
    }
    /**
     * 查询SQL
     */
    public function query($sql){
        return Db::query($sql);
    }
    /**
     * @param array $column
     * @param array $where
     * @param string $other
     */
    public function freeResult($where,$other,$column){
        $sql = self::selectToSql($where, $other, $column);
        return self::query($sql);
    }
    /**
     * 查询一行
     * @param array $column
     * @param array $where
     * @param string $other
     */
    public function fetchOne($where,$other,$column){
        $sql = self::selectToSql($where, $other, $column);
        return self::query($sql);
    }
    /**
     * 查询全部
     * @param array $column
     * @param array $where
     * @param string $other
     */
    public function fetchAll($where,$other,$column){
        $sql = self::selectToSql($where, $other, $column);
        return self::query($sql);
    }
    /**
     *
     * @param array $data
     */
    public function insert($data){
        $sql = self::queryToSql($data);
        return Db::query($sql);
    }
    /**
     *
     * @param array $data
     * @param array $where
     */
    public function update($data,$where){
        $sql = self::updateToSql($data, $where);
        return Db::execute($sql);
    }
    /**
     *
     * @param string $table
     */
    public function setTable($table){
        $this->table = $table;
    }
    /**
     * 返回最后插入的ID
     */
    public function insertID(){
        
    }
    /**
     * 返回受影响的行数
     */
    public function affectedRows(){
        
    }
    /**
     * 
     * @param array $data
     * @param array $where
     */
    protected function updateToSql($data,$where){
        $updatesql = $wheresql = $split = '';
        foreach ( $data as $key => $val ) {
            $updatesql .= $split."`$key` = '$val'";
            $split = ', ';
        }
        if ( empty($where) ) {
            $wheresql = '1';
        } else {
            $split = '';
            foreach ($where as $key => $val ) {
                $wheresql .= $split."`$key` = '$val'";
                $split = ' AND ';
            }
        }
       return $sql = "UPDATE `$this->table` SET $updatesql WHERE $wheresql";
    }
    /**
     * 
     * @param array $data
     * @param string $replace
     */
    protected function queryToSql($data,$replace = 'INSERT'){
        $method = $replace ? 'REPLACE ' : 'INSERT';
        $fields = $values = $split = '';
        foreach ( $data as $key => $val ) {
            $fields .= $split."`$key`";
            $values .= $split."'$val'";
            $split = ', ';
        }
        $sql = "$method INTO `$this->table` ($fields) VALUES ($values)";
        return $sql;
    }
    /**
     * 
     * @param array $where
     * @param string $other
     * @param string $column
     */
    protected function selectToSql($where,$other,$column){
        $sqlColumn = '';
        $sqlWhere = '';
        if(is_array($column)){
            foreach ($column as $value){
                $sqlColumn .= ", " . $value;
            }
            $sqlColumn = trim($sqlColumn,",");
        }elseif(is_string($column)){
            $sqlColumn = trim($column,",");
        }
        if(empty($sqlColumn)){
           $sqlColumn = " * "; 
        }
        if(!empty($where)){
            foreach ($where as $key=>$value){
                $sqlWhere .= "  `" . $key . "` " . $value[0] . " '" .$value . "' AND";
            }
            $sqlWhere = trim($sqlWhere,"AND");
        }else{
            $where = " 1 ";
        }
        if(!empty($other)){
            $other = '';
        }
        return "SELECT " . $sqlColumn ." " . $this->table . " where " . $sqlWhere ." " . $other;
    }
    
}

?>