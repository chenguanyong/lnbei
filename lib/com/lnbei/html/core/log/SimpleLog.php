<?php
namespace com\lnbei\html\core\log;

use com\lnbei\file\File;
use com\lnbei\html\core\config\Config;
class SimpleLog implements Log
{
    /**
     * 错误级别
     * waring :1 ;error:2;no:3
     * @var unknown
     */
    private $errorType;
    /**
     * 日志地址
     */
    private $logPath;
    /**
     * 构造函数
     */
    public function __construct($path=""){
        $this->errorType = '1';
        $this->logPath = $path;
    }
    /**
     * 写日志
     * {@inheritDoc}
     * @see \com\lnbei\html\core\log\Log::write()
     */
    public function write($text){
       return File::fWriteCcontex($this->logPath, $text);
    }
    /**
     * 读日志
     */
    public function read(){
       return File::fReadContex($this->logPath); 
    }
    
    public static function log(\Exception $e){
        $log = Config::getConfig("LOG");
        if($log["STATE"]=="OFF"){
           return false;
        }
        $log = new SimpleLog($log["LOGPATH"]);
        $str = date("Y-m-d H:i:s") . " " . $e->getMessage() . "";
        $str .= $e->getCode();
        $str .= $e->getLine();
        $str .= $e->getFile();
        $log->write($str);
    }
    
}

?>