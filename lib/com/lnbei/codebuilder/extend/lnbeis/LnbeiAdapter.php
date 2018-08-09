<?php
namespace com\lnbei\codebuilder\extend\lnbeis;
use com\lnbei\html\PageFactory;
/**
 * 创建Html字符串
 * @author Administrator
 *
 */
abstract class LnbeiAdapter
{
    /**
     * 页面工厂类
     * @var PageFactory
     */
    protected $pageFactory;
    /**
     * 数据数组 
     * @var array
     */
    protected $dataArray;
    /**
     * 
     * @param array $dataArray
     */
    public function __construct($dataArray){  
        $configData = require_once 'LnbeiConfig.php';
        $this->pageFactory = PageFactory::getPageFactory($configData);
       
        $this->dataArray = $dataArray;
    }
    /**
     * 获取套件工厂
     */
    protected function getWidgetFactory(){
        
        return $this->pageFactory == null ? null : $this->pageFactory->getWidgetFactory();
    }
    /**
     * 获取套件管理器
     */
    protected function getWidgetManage(){
        $widgetManage = self::getWidgetFactory();
        if(!empty($widgetManage)){
            return $widgetManage->getWidgetManage();
        }else{
            return null;
        }
    }
}

?>