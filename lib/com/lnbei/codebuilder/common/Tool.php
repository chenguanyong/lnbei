<?php
namespace com\lnbei\codebuilder\common;

class Tool
{
    public static function strReplace($serch, $replacement, $subject){
        
        return str_replace($serch, $replacement, $subject);
    }
}

?>