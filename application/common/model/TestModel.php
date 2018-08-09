<?php
namespace app\common\model;
use  think\Db;
class TestModel 
{
    public function printSql(){
        Db::listen(function($sql,$time,$explain){
            // 记录SQL
            echo $sql. ' ['.$time.'s]';
            // 查看性能分析结果
            dump($explain);
        });
    }
}

?>