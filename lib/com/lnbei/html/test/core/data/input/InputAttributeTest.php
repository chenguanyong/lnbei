<?php
namespace com\lnbei\html\test\core\data\input;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\data\input\InputAttribute;
class InputAttributeTest implements TestImp
{
    private $inputAttribute;
    public function __construct(){
        $tagArray = array();
        $this->inputAttribute = new InputAttribute();
    }
    public function test(){
        $temp = $this->inputAttribute;
       
        echo 'success';
    }
    public static function run(){
        $inputAttribute = new InputAttributeTest();
        $inputAttribute->test();
    }
    public function getObject(){
        return $this->inputAttribute;
    }
}

?>