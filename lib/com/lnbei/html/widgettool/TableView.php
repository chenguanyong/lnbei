<?php
namespace com\lnbei\html\tool;

use com\lnbei\html\table\TableWidget;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
/**
 * 表格设计类
 * @author Administrator
 *
 */
class TableView extends TableWidget
{
    public function __construct($tagManage, $tagCssManage, $tagAttrManage, $path, $flag){
        parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $path, $flag);   
    }    
}

?>