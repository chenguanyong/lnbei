<?php
namespace com\lnbei\html\core\data\db;

interface Drive
{
    /**
     * 查询SQL
     */
    public function query($sql);
    /**
     * 
     * @param string $sql
     */
    public function freeResult($where,$other,$column);
    /**
     * 查询一行
     * @param array $column
     * @param array $where
     */
    public function fetchOne($where,$other,$column);
    /**
     * 查询全部
     * @param array $Column
     * @param array $where
     * @param string $other
     */
    public function fetchAll($where,$other,$column);
    /**
     * 
     * @param array $data
     */
    public function insert($data);
    /**
     * 
     * @param array $data
     * @param array $where
     */
    public function update($data,$where);
    /**
     * 
     * @param string $table
     */
    public function setTable($table);
    /**
     * 返回最后插入的ID
     */
    public function insertID();
    /**
     * 返回受影响的行数
     */
    public function affectedRows();
    /**
     * @param string $database
     */
    public function setDatabase($database);
    /**
     * 获取数据库名称
     */
    public function getDatabase();
    /**
     * 
     */
    public function getTable();

}

?>