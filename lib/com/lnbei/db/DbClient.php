<?php
namespace com\lnbei\db;

use com\lnbei\db\driver\LBMySQLI;
use com\lnbei\db\driver\LBMySQL;
use com\lnbei\db\driver\LBMsSql;
use com\lnbei\db\driver\LBOracleSql;

class DbClient
{
    /**
     * 
     * @var Drive
     */
    private $drive;
    protected $driveType = 1;
    protected $dbName;
    private function selectDrive(){
        switch ($this->driveType){
            case '1':$this->drive = new LBMySQLI(ConfigDB::$dbData['MYSQLI']['host'],ConfigDB::$dbData['MYSQLI']['user'],ConfigDB::$dbData['MYSQLI']['pwd'],ConfigDB::$dbData['MYSQLI']['dbname'],ConfigDB::$dbData['MYSQLI']['port']);$this->dbName=ConfigDB::$dbData['MYSQLI']['dbname'];break;
            case '2':$this->drive = new LBMySQL(ConfigDB::$dbData['MYSQL']['host'],ConfigDB::$dbData['MYSQL']['user'],ConfigDB::$dbData['MYSQL']['pwd'],ConfigDB::$dbData['MYSQL']['dbname']);$this->dbName=ConfigDB::$dbData['MYSQL']['dbname'];break;
            case '3':$this->drive = new LBMsSql(ConfigDB::$dbData['MSSQL']['host'],ConfigDB::$dbData['MSSQL']['user'],ConfigDB::$dbData['MSSQL']['pwd'],ConfigDB::$dbData['MSSQL']['dbname']);$this->dbName=ConfigDB::$dbData['MSSQL']['dbname'];break;
            case '4':$this->drive = new LBOracleSql(ConfigDB::$dbData['ORACLE']['host'],ConfigDB::$dbData['ORACLE']['user'],ConfigDB::$dbData['ORACLE']['pwd'],ConfigDB::$dbData['ORACLE']['dbname']);$this->dbName=ConfigDB::$dbData['ORACLE']['dbname'];break;
        }
    }
    public function __construct($dbType){
        $this->driveType = $dbType;
        self::selectDrive();
    }
    /**
     * 直接查询
     * @param string $sql
     */
    public function query($sql){
        return $this->drive->query($sql);
    }
    public function noResultQuery($sql){
        return $this->drive->freeResult($sql);
    }
    public function insert($table, $data, $replace = false, $pre = true){
        return $this->drive->insert($table, $data, $replace, $pre);
    }
    public function update($table, $data, $where, $pre = true){
        return $this->drive->update($table, $data, $where, $pre);
    }
    public function insertID(){
        return $this->drive->insertID();
    }
    public function affectedRows(){
        return $this->drive->affectedRows();
    }
}

?>