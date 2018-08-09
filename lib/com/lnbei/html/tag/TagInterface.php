<?php
namespace com\lnbei\html\tag;

interface TagInterface
{
    //获取父子id
    public function getParent();
    public function setParent($parent);
    public function getSid();
    public function setSid($id);
}

?>