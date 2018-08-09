<?php
namespace com\lnbei\codebuilder\common;

class PatternType
{
    const STARTSIGN = "{";
    const ENDSIGN = "}";
    const MODULAR = self::STARTSIGN . "modular" . self::ENDSIGN;//模块类
}

?>