<?php
namespace com\lnbei\xml;
use com\lnbei\html\core\tool\Tool;
class XMLTool 
{
    private $xmlStr;
    private $xml;
    //初始化
    public function __construct($xmlStr){
        //parent::__construct($this->xmlStr);
        //$xmlStr = Tool::inspectXml($xmlStr);//
        //echo "<textarea>".$xmlStr."</textarea>";
        //exit;
        $this->xmlStr = $xmlStr;
        $this->xml = new \SimpleXMLIterator($this->xmlStr);
    }
    //迭代
    private function iterators($xml,$tagConfigXmlToolCallback){
        foreach ($xml as $v){
           $tagConfigXmlToolCallback->call($v);
           self::iterators($v,$tagConfigXmlToolCallback);
        }
    }
    public function xmlIterators($XmlToolCallback){
        self::iterators($this->xml, $XmlToolCallback);
    }
}

?>