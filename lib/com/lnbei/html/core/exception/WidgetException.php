<?php
namespace com\lnbei\html\core\exception;

class WidgetException extends \Exception
{
    public function __construct($message=null,$code=0,$previous=null){
        parent::__construct($message,$code,$previous);
    }
}

?>