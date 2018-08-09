<?php define('WSDL_URL','hello.wsdl');        //定义WSDL文件路径
ini_set('soap.wsdl_cache_enabled','1');    //关闭WSDL缓存

 //WSDL文件不存在时自动创建
if(!file_exists(WSDL_URL))
{
    require_once 'SoapDiscovery.class.php';
    $disco = new SoapDiscovery('Mywsdl','www.zhuoqu.com');
    $str = $disco->getWSDL();
    file_put_contents(WSDL_URL,$str);
}
 
//SOAP开启并接收Client传入的参数响应 
$server = new SoapServer("Mywsdl.wsdl");
$server->setClass('Mywsdl');
$server->handle();
 
 
//测试定义公开的类
class Mywsdl {
    private $nombre = '';
    public function __construct($name = 'World') 
    {
        $this->name = $name;
    }
    public function greet($name = '') 
    {
        $name = $name?$name:$this->name;
        return 'Hello '.$name.'.';
    }
    public function serverTimestamp() 
    {
        return time();
    }
    public function myfunc($a=''){
        return $a;
    }
}