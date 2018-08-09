<?php
namespace com\lnbei\db;

abstract class Model
{
    private $db;
    protected $dbType=1;//数据库类型
    protected $table;//表名
    public function __construct(){
        $this->db = new DbClient($this->dbType);
    }
}

?>