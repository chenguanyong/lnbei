<?php
namespace com\lnbei\html\test\core\data\attribute;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\file\DirErgodic;
class TagAttrManageTest implements TestImp
{
    public $tagAttributeManage;
    
    public function __construct(){
        $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\attribute\\xml",'attr.cfg.xml');
        $this->tagAttributeManage = new TagAttrManage($r[1],true);
    }
    /**
     * 
     * {@inheritDoc}
     * @see \com\lnbei\html\test\TestImp::test()
     */
    public function test(){
        $temp = $this->tagAttributeManage;
        //$array = $temp->getCommonAttr('div');
        //var_dump($array);
        $r = $temp->checkAttr("a", 'style', '55');
        var_dump($r);
    }
     
    public static function run(){
        $attr = new TagAttrManageTest();
        $attr -> test();
    }
    public function getObject(){
        return $this->tagAttributeManage;
    }
}

?>