<?php
namespace com\lnbei\html\core\data;

interface ContentIteratorCallback
{
    /**
     * 
     * @param array $tagobj
     * @param string $tags
     * @param boolean $bool
     */
    public function callback($tagobj,$tags,$bool);
}

?>