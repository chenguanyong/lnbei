<?php
namespace app\common\controller;

use com\lnbei\html\PageFactory;
use app\web\model\PageUserModel;
use app\common\widget\PageCurrentManage;
class WidgetBase extends Base
{
    protected $pageFactory;
    protected $pageCurrentManage;
    protected function _initialize(){
        parent::_initialize();
        $this->pageFactory = PageFactory::getPageFactory();
        $models = new PageUserModel();
        $this->pageCurrentManage = new PageCurrentManage($models);
    }
    public function __destruct(){
        $this->pageCurrentManage = null;
    }
}

?>