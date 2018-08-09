<?php
namespace com\lnbei\codebuilder\test;

use com\lnbei\html\test\TestImp;
use com\lnbei\codebuilder\CodeBuilder;
class CodeBuilderTest implements TestImp
{
    private $code;
    public function __construct(){
        $this->code = new CodeBuilder();
    }
    public function test(){
        $temp = $this->code;
        $temp->createByDB("ce_file");
        echo 'success';
    }
    public static function run(){
        $code = new CodeBuilderTest();
        $code->test();
    }
    public function getObject(){
        return $this->code;
    }
}

?>