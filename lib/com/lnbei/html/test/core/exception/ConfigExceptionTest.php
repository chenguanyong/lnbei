<?php
namespace com\lnbei\html\test\core\exception;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\exception\ConfigException;
use com\lnbei\html\core\config\language\cn\LanguageCN;
class ConfigExceptionTest implements TestImp
{
    private $configException;
    
    public function __construct(){
        $this->configException = new ConfigException(LanguageCN::$EXCEPTION_CONFIG_ERRORMSG);
    }
    public function test(){
      throw $this->configException;
    }
    public static function run(){
        $temp = new ConfigExceptionTest();
        $temp->test();
    }
    public function getObject(){
        return $this->configException;
    }
}

?>