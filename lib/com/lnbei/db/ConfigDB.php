<?php
namespace com\lnbei\db;

class ConfigDB
{
    public static $dbData = array(
        "MSSQL"=>array(
            "host"=>"",
            "user"=>"",
            "pwd"=>"",
            "dbname"=>""
        ),
        "ORACLE"=>array(
            "host"=>"",
            "user"=>"",
            "pwd"=>"",
            "dbname"=>""
        ),
        "MYSQL"=>array(
            "host"=>"127.0.0.1",
            "user"=>"root",
            "pwd"=>"1100",
            "dbname"=>"hh"
        ),
        "MYSQLI"=>array(
            "host"=>"127.0.0.1",
            "user"=>"root",
            "pwd"=>"1100",
            "dbname"=>"phpce",
            "port"=>"3306",
        )
    );
}

?>