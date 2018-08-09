<?php
namespace com\lnbei\html\test\widget;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\html\widget\Widget;
use com\lnbei\file\DirErgodic;

class WidgetTest implements TestImp
{
    private $widget;
    private $widgets;
    public function __construct(){
        var_dump(time());
         $tagManageTest = new TagManageTest();
         $tagManage = $tagManageTest->getObject();
         $tagCssManageTest = new TagCssManageTest();
         $tagCssManage = $tagCssManageTest->getObject();
         $tagAttrManageTest = new TagAttrManageTest();
         $tagAttrManage = $tagAttrManageTest->getObject();
         $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\xml",'panl.widget.xml');
         var_dump(time());
         $this->widget = new Widget($tagManage, $tagCssManage, $tagAttrManage, $r[1],true);
         var_dump(time());
        // $rs = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\xml",'panl1.widget.xml');
        // $this->widgets = new Widget($tagManage, $tagCssManage, $tagAttrManage, $rs[1],true);
    }
    public function test(){
        
        $widget = $this->widget;
        //$widgets = $this->widgets;
        $arrayd= $widget->getWidgetArray();
        var_dump($arrayd);
        var_dump(time());
       $str = $widget->widgetToString();
       var_dump(time());
      echo "<textarea>".$str."</textarea>";
      $arra = $widget->getElementBySelector("[b]");
      var_dump($arra);
      exit;
//         $str = $widgets->widgetToString();
//        echo "<textarea>".$str."</textarea>";
//         $array = $widget->getWidgetArray();
//         var_dump($array);
        
//         $i=0;
//         foreach($array as $key=>$v){
        
//             //$kk = $v[0]->getSid();
//             if($i==2){
//                 var_dump($v[0]->getTagAttribute());
//                 $kk1 = $v[0]->getSid();
//                 break;
//             }
//             $i++;
//         }
//        var_dump($kk1);
//       // exit;
//         $widget->addChildrenWidget($kk1, $widgets);
//         $array = $widget->getWidgetArray();
//         var_dump($array);
//        // $widget->getRule()->var_dumps();
//         $str = $widget->widgetToString();
//         echo "<textarea>".$str."</textarea>";
//         exit;
//         $kk = '';
//         $i=0;
//         foreach($array as $key=>$v){
            
//             //$kk = $v[0]->getSid();
//             if($i==2){
//                 var_dump($v[0]->getTagAttribute());
//                  $kk = $v[0]->getSid();
//                 break;
//             }
//             $i++;
//         }
//         var_dump($kk);
//         $widget->moveTag($kk, $toPID='', $kk1, $fromPID='');
//         //exit;
//         $v = $widget->getWidgetArray();
//         var_dump($v);
//         exit;
//         $tag = $widget->getElementByLBID($kk);
//         var_dump($tag);
//         $tag->addContet("ddddddddddddddddddddddddddddddddddddddddddd");
//         //exit();
//         $str = $widget->widgetToString();
//         echo "<textarea>".$str."</textarea>";
//         exit();
// //         $str = $widgets->widgetToString();
// //         echo "<textarea>".$str."</textarea>";
//         var_dump($str);
    }
    public static function run(){
        $widget = new WidgetTest();
        $widget->test();
    }
    public function getObject(){
        return $this->widget;
    }
}

?>