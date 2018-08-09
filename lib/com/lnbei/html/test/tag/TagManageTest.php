<?php
namespace com\lnbei\html\test\tag;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\tag\TagManage;
use com\lnbei\file\DirErgodic;
class TagManageTest implements TestImp
{
    private $tagManage;
    public function __construct(){
        //
        //$r = DirErgodic::ergodics("G:\\linbei\\root\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\css\\xml",'css.cfg.xml');
        $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\tag\\xml",'tag.cfg.xml');
        $this->tagManage = new TagManage($r[1],true);
    }
    public function test(){
        $temp = $this->tagManage;
        $var = $temp->getTagArray();
        var_dump($var);
    }
    public static function run(){
        $temp = new TagManageTest();
        $temp->test();
    }
    public function getObject(){
        return $this->tagManage;
    }
}

?>