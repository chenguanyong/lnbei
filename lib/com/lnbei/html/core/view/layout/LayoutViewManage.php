<?php
namespace com\lnbei\html\core\view\layout;

use com\lnbei\html\core\view\ViewManage;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\core\config\Config;
class LayoutViewManage extends ViewManage 
{
    public function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage,$floag = true){
       // $dir = Config::$confArray['TEMPLATEPATH']."";
        $dirs = Config::$confArray['LAYOUTTEMPLATEPATH'];
       // $dirs[] = $dir;
        parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $dirs, $floag);
    }
    public function addLayoutView($layoutView){
        parent::addWidget($layoutView);
    }
    public function deleLayoutView($layoutView){
        parent::deleWidget($layoutView);
    }
    public function getLayoutView($name){
        return parent::getWidget($name);
    }
    public function getLayoutViewsArray(){
        return parent::getWidgetsArray();
    }
}

?>