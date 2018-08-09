<?php
namespace com\lnbei\html\test\widgettool;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\widgettool\WidgetList;
class WidgetListTest implements TestImp
{
    private $widgetList;
    public function __construct(){
        $this->widgetList = new WidgetList();
    }
    public function test(){
        $temp = $this->widgetList;
        var_dump($temp->getWidgetList());
//         foreach ($temp->getWidgetList() as $key=>$value){
//             foreach ($value as $keys=>$g){
//                 foreach($g as $gd=>$vs){
//                     var_dump($vs);
//                 }
//             }
//         break;
//         }
        print_r($temp->getWidgetList());
        $r = $temp->getWidgetListByPid('4');
        var_dump($r);
    }
    public static function run(){
        $widget = new WidgetListTest();
        $widget->test();
    }
    public function getObject(){
        return $this->tableView;
    }
}

?>