<?php
namespace com\lnbei\html\core\data\content\conf;
use com\lnbei\html\core\data\content\conf\ContentConfXmlIteratorCallback;
use com\lnbei\xml\Xmliteration;
use com\lnbei\file\File;
use com\lnbei\html\core\data\ContentIterator;
class Conf
{
    private $conf;
    private $contentConfXmlIteratorCallback;//
    public function __construct($path,$bool=false){
        $this->conf = array();
        $this->contentConfXmlIteratorCallback = new ContentConfXmlIteratorCallback();
        if($bool){
            init($path);
        }
    }   
    public function init($path){
        $xmlstr = '';
        try {
            $xmlstr = File::fReadContex($path);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        $xmllteration = new Xmliteration($xmlstr);
        $xmllteration->literation($this->contentConfXmlIteratorCallback);
        
        $contentIterator = new ContentIterator();
        $contentIterator->runIteration($this->contentConfXmlIteratorCallback);
        $this->conf = $this->contentConfXmlIteratorCallback->getConf();
    } 
}

?>