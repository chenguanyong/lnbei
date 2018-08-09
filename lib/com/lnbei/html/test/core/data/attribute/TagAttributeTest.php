<?php
namespace com\lnbei\html\test\core\data\attribute;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\core\data\attribute\TagAttribute;
class TagAttributeTest implements TestImp
{
    public $tagAttribute;
    
    public function __construct(){
        //$r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\attribute\\xml",'attr.cfg.xml');
        $r = DirErgodic::ergodics("G:\\linbei\\root\\phpace_dev\\lib\\com
            \\lnbei\\html\\core\\data\\attribute\\xml",'attr.cfg.xml');
        $tagAttrManage = new TagAttrManage($r[1],true);
        $attrTestArray = array("width"=>"80px","height"=>"500px");
        $this->tagAttribute = new TagAttribute($attrTestArray,'div',$tagAttrManage);
    }
    /**
     * 
     * {@inheritDoc}
     * @see \com\lnbei\html\test\TestImp::test()
     */
    public function test(){
        $temp = $this->tagAttribute;
        $array = $temp->getAttrArray();
        var_dump($array);
        $str = $temp->toString();
        echo "<textarea>".$str."</textarea>";
    }
     
    public static function run(){
        $attr = new TagAttributeTest();
        $attr -> test();
    }
    public function getObject(){
        return $this->tagAttribute;
    }
}

?>