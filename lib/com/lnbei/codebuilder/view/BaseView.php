<?php
namespace com\lnbei\codebuilder\view;
use com\lnbei\codebuilder\extend\lnbeis\CURDView;
/**
 * 创建视图的基类
 * @author Administrator
 *
 */
class BaseView
{
    /**
     * 数组转换HTML
     * @var CURDView
     */
    private $CURDView;
    /**
     * 文件数据
     * @var array
     */
    private $fieldData;
    /**
     * 配置文件
     * @var unknown
     */
    private $configData;
    /**
     * 构造函数
     */
    public function __construct($fieldData,$config,$path){
        $this->fieldData = $fieldData;
        $this->configData = $config;
        $this->CURDView = new CURDView($fieldData, $path);
    }
    /**
     * 创建视图
     * @param array $fieldData
     * @param string $viewType
     */
    public function createView($viewType, $configData){
        $str = "";
        switch($viewType){
            case ViewType::ADDVIEW:{ $str = self::add($configData);} break;
            case ViewType::EDITVIEW:{ $str = self::update($configData);}break;
            case ViewType::LOOKVIEW:{ $str = self::look($configData);}break;
            case ViewType::DELEVIEW:{ $str = self::dele($configData);}break;
        }
        return $str;
    }
    /**
     * 更新
     * @param array $filedData
     */
    public function update($configData){
        return $this->CURDView->doView($configData);
    }
    /**
     * add
     * @param array $filedData
     */
    public function add($configData){
        return $this->CURDView->doView($configData);
    }
    /**
     * 删除
     * @param array $filedData
     */
    public function dele($configData){
        return $this->CURDView->doView($configData);
    }
    /**
     * 查看
     * @param array $filedData
     */
    public function look($configData){
        return $this->CURDView->doView($configData);
    }
}

?>