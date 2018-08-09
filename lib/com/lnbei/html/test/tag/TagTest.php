<?php
namespace com\lnbei\html\test\tag;

use com\lnbei\html\tag\Tag;
use com\lnbei\html\test\TestImp;
use com\lnbei\html\test\core\data\attribute\TagAttributeTest;
use com\lnbei\html\test\core\data\css\TagCssTest;
class TagTest implements TestImp
{
    private $tag;
    public function __construct(){
        $tagAttributeObject = new TagAttributeTest();
        $tagAttribute = $tagAttributeObject->getObject();
        $tagCssObject = new TagCssTest();
        $tagCss = $tagCssObject->getObject();
        $tempTag = ['attr'=>array("width"=>"20px"),'id'=>'10','pid'=>'100',"content"=>'sdfsd',"xid"=>'4',"xpid"=>'2'];
        $this->tag = new Tag($tagAttribute, $tagCss, $tempTag);
    }
    public function test(){
        $temp = $this->tag;
        $temp->setContent('sdfadf');
    }
    public static function run(){
        $temp = new TagTest();
        $temp->test();
    }
    public function getObject(){
        return $this->tag;
    }
}

?>