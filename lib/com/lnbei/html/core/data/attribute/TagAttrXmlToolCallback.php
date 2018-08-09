<?php
namespace com\lnbei\html\core\data\attribute;

use com\lnbei\xml\XmlToolCallback;
class TagAttrXmlToolCallback implements XmlToolCallback
{
    private $attrArray;
    public function __construct(){
        $this->attrArray = array();
    }
    public function call($xmlobj){
        foreach ($xmlobj->children() as $second_gen) {
            $this->attrArray[$second_gen] = array();
            foreach ($xmlobj->attributes() as $key=>$value){
                $this->attrArray[$second_gen][$key] = $value;
            }
        }
    }
    public function getAttrArray(){
        return $this->attrArray;
    }
}

?>