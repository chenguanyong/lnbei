<?php
namespace com\lnbei\db;

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
    public function freeResult($sql);

    /**
     * 返回最后插入的ID
     */
    public function insertID();
    /**
     * 返回受影响的行数
     */
    public function affectedRows();
    /**
     * 插入数据
     */
    public function insert($table, $data, $replace = false, $pre = true);
    /**
     * 更新数据
     */
    public function update($table, $data, $where, $pre = true);

}

?>