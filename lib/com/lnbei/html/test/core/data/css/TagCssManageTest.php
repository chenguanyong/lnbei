<?php
namespace com\lnbei\html\test\core\data\css;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\file\DirErgodic;
class TagCssManageTest implements TestImp
{
    /**
     * 
     * @var TagCssManage
     */
    private $tagCssManage;
    public function __construct(){
        $xmlPath = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\css\\xml",'css.cfg.xml');
        //$xmlPath = DirErgodic::ergodics("G:\\linbei\\root\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\css\\xml",'css.cfg.xml');
        $this->tagCssManage = new TagCssManage($xmlPath[1],true);
    }
    /**
     * 
     * {@inheritDoc}
     * @see \com\lnbei\html\test\TestImp::test()
     */
    public function test(){
        $temp = $this->tagCssManage->getCssArray();
        var_dump($temp);
    }
    /**
     * 
     */
    public static function run(){
        $tagCss = new TagCssManageTest();
        $tagCss->test();
    }
    
    public function getObject(){
        return $this->tagCssManage;
    }
}

?>