<?php
namespace com\lnbei\xml;

interface XMLIteratorCallback
{
    //迭代回调函数
    public function call($xmlObj,$IDArray);
    //获取根标签
    public function setFristTag($data);
}

?>