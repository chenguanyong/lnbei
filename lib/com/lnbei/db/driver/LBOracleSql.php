<?php
namespace com\lnbei\db\driver;

use com\lnbei\db\Drive;
class LBOracleSql implements Drive
{
    private $host;
    private $user;
    private $pwd;
    private $db;
    private $dbName;
    private $tempSql;
    public function __construct($host,$user,$password,$dbName){
        $this->host = $conString;
        $this->user = $user;
        $this->pwd = $password;
        $this->dbName = $dbName;
        $this->db = self::oracle_connect();
    }
   private function oracle_connect(){

        try{
            $db = "oci:dbname=" . $this->host . "/" . $this->dbName . ";charset=utf8";
            $conn = new \PDO($db,$this->user,$this->pwd);
            // $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
        }catch(PDOException $e){
            //echo ($e->getMessage());
        }
        return $conn;
    }
    public function query($sql){
        $r = $this->db->query($sql);
        $result = array();
        foreach ($r as $k=>$value){
            foreach ( $value as $r=>$v){
                if($v == null){
                    $result[$k][$r]="";
                }else{
                    $result[$k][$r]=$v;
                }
            }
        }
        return $result;
    }
    /**
     *
     * @param string $sql
     */
    public function freeResult($sql){
        $this->tempSql = $sql;
        return $this->db->exec($sql);
    }
    
    /**
     * 返回最后插入的ID
     */
    public function insertID(){}
    /**
     * 返回受影响的行数
     */
    public function affectedRows(){
        
        if(!empty($this->tempSql)){
            return $this->db->exec($this->tempSql);
        }else{
            return false;
        }
    }
    /**
     * 插入数据
     */
    public function insert($table, $data, $replace = false, $pre = true){}
    /**
     * 更新数据
     */
    public function update($table, $data, $where, $pre = true){}
}

?>