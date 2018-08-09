<?php
namespace com\lnbei\db;

use com\lnbei\db\DbClient;
class Database
{
    private $db;
    protected $dbType=1;//数据库类型
    public function __construct(){
        $this->db = new DbClient($this->dbType);
        
    }
    public function noQuery($sql){
        
    }
    public function Query($sql){
        return $this->db->query($sql);
    }
    public function insert($table, $data, $replace = false, $pre = true){
        return $this->db->insert($table, $data, $replace, $pre);
    }
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }
    public function getInsetID(){
        return $this->db->insertID();
    }
}

?>