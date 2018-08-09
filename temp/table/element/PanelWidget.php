<?php
namespace com\lnbei\html\widget\element;

use com\lnbei\html\widget\Widget;
use com\lnbei\html\tag\div;

class PanelWidget extends Widget
{
    
    public function __construct(){
        parent::__construct();
    }
    //重画
    protected function draw(){
        $main = new div();
        $main->setCss($this->data[0]->css);
    }
}

?>