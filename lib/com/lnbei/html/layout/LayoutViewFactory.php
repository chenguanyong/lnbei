<?php
namespace com\lnbei\html\layout;

use com\lnbei\html\core\view\layout\LayoutViewManage;
use com\lnbei\html\tag\TagManage;
use com\lnbei\html\core\data\css\TagCssManage;
use com\lnbei\html\core\data\attribute\TagAttrManage;
use com\lnbei\html\LayoutView;
class LayoutViewFactory
{
    /**
     *
     * @var LayoutViewFactory
     */
    private static $layoutFactory;
    /**
     *
     * @var LayoutViewManage
     */
    private $layoutViewManage;
    /**
     * 标签管理器
     * @var TagManage
     */
    private $tagManage;
    /**
     * 标签样式管理器
     * @var TagCssManage
     */
    private $tagCssManage;
    /**
     * 标签属性管理器
     * @var TagAttrManage
     */
    private $tagAttrManage;
    /**
     * 构造函数
     */
    private function __construct(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage){
        //self::init($tagManage, $tagCssManage, $tagAttrManage);
        $this->tagAttrManage = $tagAttrManage;
        $this->tagManage = $tagManage;
        $this->tagCssManage = $tagCssManage;
        $this->widgetManage = new LayoutViewManage($tagManage, $tagCssManage, $tagAttrManage);
    }
    /**
     * 获取指定套件
     * @return \com\lnbei\html\widget\WidgetFactory|\com\lnbei\html\widget\unknown
     */
    public static function getLayoutViewFactory(TagManage $tagManage,TagCssManage $tagCssManage,TagAttrManage $tagAttrManage){
        if(self::$layoutFactory == null){
            return new LayoutViewFactory($tagManage, $tagCssManage, $tagAttrManage);
        }else{
            return self::$layoutFactory;
        }
    }
    public function getLayoutViewManage(){
        return $this->layoutViewManage;
    }
    public function getLayoutView($name){
        return $this->layoutViewManage->getLayoutView($name);
    }
    public function getLayoutViewList(){
        return $this->layoutViewManage->getLayoutViewsArray();
    }
    //通过HTML文件实例化widgetView类
    public function buildLayoutView($html){
        $layoutView = new LayoutView($this->tagManage, $this->tagCssManage, $this->tagAttrManage, $path='',false);
        $layoutView->initByHtml($html,$this->tagManage, $this->tagCssManage, $this->tagAttrManage);
        return $layoutView;
    }
}

?>