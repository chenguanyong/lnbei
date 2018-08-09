<?php
/**
 * 
 * 
 * php操作Oracle数据库
 * 
 * 
 * 
 * 
 * 
 * @param unknown $name
 * @param unknown $depart
 * @return PDOStatement[]
 */
function oracle_get_userInfo($name,$depart){

    $db_username = "hdkj";
    $db_password = "hd123";
    try{
        $db = "oci:dbname=192.168.0.43/hnichr;charset=utf8";
        $conn = new PDO($db,$db_username,$db_password);
        // $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
    }catch(PDOException $e){
        echo ($e->getMessage());
    }
    if(trim($depart," ") != "河南投资集团有限公司"){
        $sql = "select a01.*,deptcode.* from sa.a01 left join sa.deptcode on a01.DEPTCODE_KEY = deptcode.DEPTCODE_KEY where a01.A0101='" . $name . "' and DEPT_FULL_NAME like '%" . trim($depart," ") . "%'";
    }else{
        $sql = "select a01.*,deptcode.* from sa.a01 left join sa.deptcode on a01.DEPTCODE_KEY = deptcode.DEPTCODE_KEY where a01.A0101='" . $name . "' and DEPT_FULL_NAME like '%集团本部%'";
    }
    $r = $conn->query($sql);
    $result = array();
    foreach ($r as $value){

        $result[]=$value;
    }
    return $result;
}