<?php
namespace com\lnbei\html\test\core\data\css;
use com\lnbei\html\test\TestImp;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\css\TagCss;
class TagCssTest implements TestImp
{
    private $tagCss;
    
    public function __construct(){
       $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\css\\xml",'css.cfg.xml');
        //$r = DirErgodic::ergodics("G:\\linbei\\root\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\css\\xml",'css.cfg.xml');
        
        $temp = new TagCssManage($r[1],true);
        $this->tagCss = new TagCss(array("width"=>"20px","top"=>"30px"),'div',$temp);
    }
    public function test(){
        $temp = $this->tagCss;
        $temp->initCSS(array("ll"=>"sdf","top"=>"90px"));
        $str = $temp->toString();
        var_dump($str);
        //var_dump($array);
    }
     
    public static function run(){
        $attr = new TagCssTest();
        $attr -> test();
    }
    public function getObject(){
        return $this->tagCss;
    }
}

?>