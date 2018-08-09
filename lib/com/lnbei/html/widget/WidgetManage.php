<?php
namespace com\lnbei\html\widget;
/**
 * 系统输入套件管理
 */
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\core\view\ViewManage;
use com\lnbei\html\core\config\Config;
class WidgetManage extends ViewManage
{
    public function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage,$floag = true){
        $dir = Config::$confArray['SYSTEMTEMPLATEPATH']."\\output";
        $dirs = Config::$confArray['WIDGETTEMPLATEPATH'];
        $dirs[] = $dir;
        parent::__construct($tagManage, $tagCssManage, $tagAttrManage, $dirs, $floag);
    }
    public function addSysWidget($widget){
        //parent::addWidget($widget);
    }
    public function deleSysWidget($widget){
        //parent::deleWidget($widget);
    }
    public function getSysWidget($name){
        return parent::getWidget($name);
    }
    public function getSysWidgetsArray(){
       // return parent::getWidgetsArray();
    }
    /**
     * 识别关键字是否匹配系统套件列表
     * @return bool
     */
    public function recWidgetKey($widgetName){
        $widgetName = trim($widgetName);
        $pattern = '/_([a-z,A-Z,0-9,-]*' . $widgetName . ')_$/i';
        $return = preg_match_all($pattern, $this->widgetKeysStr, $array_information);
        if($return == 0){
            return false;
        }
        return $array_information[1][0];
    }
}

?>