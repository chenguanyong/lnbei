<?php
namespace com\lnbei\html\test\table;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\test\tag\TagManageTest;
use com\lnbei\html\test\core\data\css\TagCssManageTest;
use com\lnbei\html\test\core\data\attribute\TagAttrManageTest;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\table\TableWidget;
class TableWidgetTest implements TestImp
{
    private $tableWidget;
    public function __construct(){
        $tagManageTest = new TagManageTest();
        $tagManage = $tagManageTest->getObject();
        $tagCssManageTest = new TagCssManageTest();
        $tagCssManage = $tagCssManageTest->getObject();
        $tagAttrManageTest = new TagAttrManageTest();
        $tagAttrManage = $tagAttrManageTest->getObject();
        $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\template",'table.widget.xml');
        $this->tableWidget = new TableWidget($tagManage, $tagCssManage, $tagAttrManage, $r[1],true);
    }
    public function test(){
        $temp = $this->tableWidget;
        $result = $temp->getWidgetArray();
        var_dump($temp->getCol());
        var_dump($temp->getRow());
        var_dump($result);
        //echo "<textarea>" . $temp->widgetToString()."</textarea>";
        //$temp->createTable(5, 6);
       // echo "<textarea>" . $temp->widgetToString()."</textarea>";
        $widgetArray = $temp->getWidgetArray();
       
        $hh = array();
        $i = 1;
        foreach ($widgetArray as $key=>$value){
            foreach ($value as $l=>$g){
                //exit();
                if($g->getTag() == "td"){
                  $hh[] = array(
                        'id'=>$g->getSid(),//单元格ID
                        'pid'=>$g->getParent()//单元格父ID
                    );
                  if($i==10){
                      break;
                  }
                  $i++;
                }
            }
            if($i==10){
                break;
            }
        }
        var_dump($hh);
        //exit;
        /**
         * 测试合并单元格
         */
        $temp->mergeCol($hh);
        $widgetArray = $temp->getWidgetArray();
        var_dump($widgetArray);
        //exit;
        $tag = $temp->getElementByLBID($hh[0]['id']);
        var_dump($tag);
        $hhf = $tag->getTagAttribute();
        var_dump($hhf);
       // echo "<textarea>" . $tag->toString()."</textarea>";
        $widgetArray = $temp->getWidgetArray();
        var_dump($widgetArray);
        //$temp->widgetToString();
        echo "<textarea>" . $temp->widgetToString()."</textarea>";
        /**
         * 拆分单元格
         */
        $temp->splitCol(array("id"=>$hh[0]['id']), 2,false);
        $widgetArray = $temp->getWidgetArray();
        
        //var_dump($widgetArray);
        var_dump($hh[0]['id']);
        echo "<textarea>" . $temp->widgetToString()."</textarea>";
//         $temp->splitCol(array("id"=>$hh[0]['id']), 2);
//         $widgetArray = $temp->getWidgetArray();
        
//        // var_dump($widgetArray);
//         var_dump($hh[0]['id']);
//         echo "<textarea>" . $temp->widgetToString()."</textarea>";
    }
    public static function run(){
        $temp = new TableWidgetTest();
        $temp->test();
    }
    public function getObject(){
        return $this->tableWidget;
    }
}

?>