<?php
namespace com\lnbei\math;

class MathTool
{
    /**
     * 随机数
     */
    public static function random(){
        return \uniqid().rand(1000,9999);
    }
}

?>