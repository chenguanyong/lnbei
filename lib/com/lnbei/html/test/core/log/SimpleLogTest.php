<?php
namespace com\lnbei\html\test\core\log;

use com\lnbei\html\core\log\SimpleLog;
use com\lnbei\html\test\TestImp;
class SimpleLogTest implements TestImp
{
    private $simpleLog;
    
    public function __construct(){
        
        $this->simpleLog =new SimpleLog("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\config\\log.txt");
    }
    public function test(){
        $this->simpleLog->write("sdfs");
    }
    public static function run(){
        $temp = new SimpleLogTest();
        $temp->test();
    }
    public function getObject(){
        return $this->simpleLog;
    }
}

?>