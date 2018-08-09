<?php
namespace com\lnbei\html\widget\element;

use com\lnbei\html\widget\Widget;
use com\lnbei\html\tag\div;
use com\lnbei\html\tag\h;
use com\lnbei\html\tag\a;
use com\lnbei\html\tag\i;
use com\lnbei\html\tag\ul;
use com\lnbei\html\tag\li;
class BoxWidget extends Widget

{   private $mainbox = null;
    private $mainheader = null;//box的 头部
    private $mainbody = null;
    public function __construct(){
        parent::__construct();
        $this->mainbox = new div();
        $this->mainbody = new div();
        $this->mainheader = new div();
        $this->mainbox ->setCss("widget-box ui-sortable-handle");
        $this->mainbody->setCss("widget-body");
        $this->mainheader->setCss("widget-header");
    }
    //重画
    protected function draw(){
        $datacont = $this->data;
        $div = new div();//tool
        $h5 = new h("h5");//标题
        $h5->setCss("widget-title");
        $h5->content="sdfsdf";//文章标题
        $this->mainheader->content = $h5->reDraw();
        
        for($i = 0;$i<count($datacont->child);$i++){
            
           $child = new div(); 
           $child->setCss("widget-menu"); 
           $a = new a();
           $a->setCss($datacont->child[$i]->css);
           $a->href=$datacont->child[$i]->href;
           $a->setAttr(["data-action"=>"settings","data-toggle"=>"dropdown"]);
           $a->content =  $datacont->child[$i]->content;
           $i = new i();
           $i->setCss("$datacont->child[$i]->iconClass");
           $a->content = $i->reDraw() . $a->content;
           $child->content = $child->content . $a->reDraw();
           
           $uul = new ul();
           $uul->setCss("dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer");
           $childdata = $datacont->child[$i]->child;
           for($i=0;$i<count($childdata);$i++){
               $lili = new li();
               $aa = new a();
               $aa->setCss($childdata->css);
               $aa->href = $childdata->href;
               $aa->content = $childdata->content;
               $lili->content = $aa->reDraw();
               $uul->content = $uul->content . $lili->reDraw();
           }
          $child->content = $child->content . $uul->reDraw();
          $this->mainheader->content = $child->reDraw();
            
        }
        $widget = new div();
        $widget->setCss("widget-main");
        $widget->content=$this->data->content;
        $this->mainbody->content=$widget->reDraw();
        $this->mainbox->content = $this->mainheader->reDraw();
        $this->mainbox->content = $this->mainbox->content . $this->mainbody->reDraw();
        return $this->mainbox->reDraw();
        
    }
}

?>