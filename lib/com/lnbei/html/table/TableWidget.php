<?php
namespace com\lnbei\html\table;

use com\lnbei\html\widget\Widget;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\core\tool\Tool;
/**
 * 表格数据设计类
 * @author Administrator
 *<table border="1">
 * <tr>
  *  <th>月份</th>
  *  <th>存款</th>
  *</tr>
 * <tr>
 *   <td>一月</td>
  *  <td>1000 元</td>
  *</tr>
*</table>
 */
class TableWidget extends Widget
{
    private $tagAttrManage;
    private $tagCssManage;
    private $tagManage;
    private $col;//列数 
    private $row;//行数
    public function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage, $path, $flag){
        parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $path,$flag);
        $this->tagAttrManage = $tagAttrManage;
        $this->tagCssManage = $tagCssManage;
        $this->tagManage = $tagManage;
        if($flag){
            self::init();
        }
    }
    public function getCol(){
        return $this->col;
    }
    public function getRow(){
        return $this->row;
    }
    public function setCol($col){
        $this->col = $col;
    }
    public function setRow($row){
        $this->row = $row;
    }
    /*
     * 创建表格
     */
    public function createTable($col,$row){
        $this->col = $col;
        $this->row = $row;
        $this->widgetArray = array();
        Tool::loader("com/lnbei/html/tag", 'Table');
        Tool::loader("com/lnbei/html/tag", 'Tr');
        Tool::loader("com/lnbei/html/tag", 'Td');
        Tool::loader("com/lnbei/html/tag", 'Th');
        $dataArray = ['attr'=>array(),'id'=>Tool::random(),'pid'=>Tool::random(),"content"=>'',"xid"=>1,"xpid"=>0];
        $table = new \Table($this->tagAttrManage->getTagAttribute('table'), $this->tagCssManage->getTagCss('table'), $dataArray);
        $this->widgetArray[$dataArray['pid']][]=$table;
        $tempCol = 0;
        $tempRow = 0;
        $row += 1;
        //$tempID = $dataArray['id'];
        $tempPID = $dataArray['id'];
        for($tempRow = 0; $tempRow < $row; $tempRow++){
            $tempID = Tool::random();
            $tempDataArray = ['attr'=>array(),'id'=>$tempID,'pid'=>$tempPID,"content"=>'',"xid"=>1,"xpid"=>0];
            $tr = new \Tr($this->tagAttrManage->getTagAttribute('tr'), $this->tagCssManage->getTagCss('tr'), $tempDataArray);
            for($tempCol = 0; $tempCol < $col; $tempCol++){
                $tempColID = Tool::random();
                $tempDataArrays = ['attr'=>array(),'id'=>$tempColID,'pid'=>$tempID,"content"=>'ddww',"xid"=>1,"xpid"=>0];
                if($tempRow == 0){
                    $t = new \Th($this->tagAttrManage->getTagAttribute('th'), $this->tagCssManage->getTagCss('th'), $tempDataArrays);
                }else{
                    $t = new \Td($this->tagAttrManage->getTagAttribute('td'), $this->tagCssManage->getTagCss('td'), $tempDataArrays);
                }
                $this->widgetArray[$tempDataArray['id']][]=$t;
            }
            $this->widgetArray[$tempDataArray['pid']][]=$tr;
        }
        return $this->widgetArray;
    }
    /**
     * 初始化表格
     */
    protected function init(){
        $tempCol = 0;
        $tempRow = 0;
        foreach ($this->widgetArray as $key=>$value){
            $temCol1 = 0;
            foreach ($value as $k=>$v){
                $tag = $v->getTag();
                if($tag == 'tr'){
                    $tempRow++;
                }
                if($tag == 'td'){
                    $temCol1++;
                }
            }
            if($tempCol<$temCol1){
                $tempCol = $temCol1;
            }            
        }
        $this->row = $tempRow;
        $this->col = $tempCol;
    }
    
    /**
     *合并单元格
     *@param $colArray array 
     *array(0=>
     *      array(
     *          'id'=>0,//单元格ID
     *          'pid'=>0//单元格父ID
     *      )
     *)
     */
    public function mergeCol($colArray){
        $tempArray = array();
        foreach ($colArray as $key=>$value){
            $tempArray[$value['pid']][] = $value;
        }
        $tempKey = array_keys($tempArray);
        $temCol = count($tempArray[$tempKey[0]]);
        $temRow = count($tempArray);
        $tag = parent::getElementByLBID($colArray[0]['id']);
        if($temRow>1){
            $tag->setTagAttr('rowspan', $temRow);
        }
        if($temCol >1){
            $tag->setTagAttr('colspan', $temCol);
        }
        for($i=1;$i<count($colArray);$i++){
            parent::deleWidgetOrTagByID($colArray[$i]['id']);
        }
    }
    /**
     *拆分单元格
     *
     */
    public function splitCol(array $col,$colSize,$isColOrRow=true){
        $tag = parent::getElementByLBID($col['id']);

        if($tag instanceof Widget){
            return false;
        }
        $xpid = $tag->getParent();//父ID
        /*
         * 获取该单元格所在的位置
         */
        $tagSeat = 0;
        for ($i = 0; $i<count($this->widgetArray[$xpid]);$i++){
            $tempID = $this->widgetArray[$xpid][$i]->getSid();
            if($tempID == $col['id']){
                $tagSeat = $i;
                break;
            }
        }
                //$tag->setTagAttr('colspan', 100);

        /*
         * 
         */
        if($isColOrRow){
           $col = $tag->getTagAttr('colspan');
           if(!empty($col)){
               if($colSize > $col){
                   $colSize = $col;
                   
               }
               //$tag->setTagAttr('colspan', $tempSize);
//                echo "<textarea>" . $tag->toString()."</textarea>";
               $tempArray = array();
              
               for ($i = 0; $i<count($this->widgetArray[$xpid]);$i++){
                   $tempArray[] = $this->widgetArray[$xpid][$i];

                   if($i == $tagSeat){
                      /*
                       * 赋值
                       */
                       for($a=0; $a < ($colSize-1); $a++){
                           $copyTag = $tag->copyTag();
                           $copyTag->setTagAttr('colspan', 0);
                           $tempArray[]= $copyTag;
                       }
                   }
               }
               $tempSize = $this->col - count($tempArray)+1;
               $tag->setTagAttr('colspan', $tempSize);
               $this->widgetArray[$xpid] = $tempArray;
               return true;
           }else{
               return false;
           }
        }else{
            $row = $tag->getTagAttr('rowspan');
            if(!empty($row)){
                if($colSize >= $row){
                    $colSize = $row;
                    $tag->unSetAttr('rowspan');
                }else if($colSize < 2){
                    $colSize=1;
                    $tag->setTagAttr('rowspan', $colSize);
                }else{
                    $tag->setTagAttr('rowspan', $colSize);
                }
                $parentID = $tag->getParent();//表格的父ID
                $tr = parent::getElementByLBID($parentID);//父标签
                $trParentID = $tr->getParent();
              
                
                $tempRowSeat = 0;
                for ($i = 0; $i<count($this->widgetArray[$trParentID]);$i++){
                    $tempID = $this->widgetArray[$trParentID][$i]->getSid();
                    if($tempID == $parentID){
                        //ECHO "DKFK";
                        $tempRowSeat = $i;
                        break;
                    }
                }
                
                $temTrArray = array();
                $s=1;
                for($s; $s < $colSize; $s++){
                    $tempTrPanrentID = $this->widgetArray[$trParentID][($s+$tempRowSeat)]->getSid();
                    if(empty($this->widgetArray[$tempTrPanrentID])){
                        $tempTag = $tag->copyTag();
                        $tempTag->setTagAttr('colspan', $tag->getTagAttr("colspan"));
                        $temTrArray[] = $tempTag;
                        $this->widgetArray[$tempTrPanrentID] = $temTrArray;
                        $temTrArray = array();
                        continue;
                    }else{
                        for($i=0;$i<count($this->widgetArray[$tempTrPanrentID]);$i++){
                            $temTrArray[] = @$this->widgetArray[$tempTrPanrentID][$i];
                            if($i == $tagSeat){
                                $tempTag = $tag->copyTag();
                                $tempTag->setTagAttr('colspan', $tag->getTagAttr("colspan"));
                                $temTrArray[] = $tempTag;
                            }
                        }
                    }
                    $this->widgetArray[$tempTrPanrentID] = $temTrArray;
                    $temTrArray = array();
                }
                return true;
            }else{
                return false;
            }
        }
    }
    /**
     * 插入表格
     */
    public function insertRowOrCol(){}
    /**
     * 删除表格
     */
    public function deleRowOrCol(){}
   }

?>