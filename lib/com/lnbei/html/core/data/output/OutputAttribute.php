<?php
namespace com\lnbei\html\core\data\output;

use com\lnbei\html\Page;
use com\lnbei\html\tag\Tag;
use com\lnbei\html\LayoutView;
use com\lnbei\html\widget\WidgetFactory;
use com\lnbei\html\PageFactory;
class OutputAttribute
{
    /**
     * 专属标签
     * @var $tag
     */
    private $tag;//专属标签
    /**
     * 布局对象
     * @var $layout
     */
    private $layout;//布局对象
    /**
     * 套件对象
     * @var $widget
     */
    private $widget;//
    /**
     * 标签对象
     * @var Tag
     */
    private $tagObj;
    /**
     * 
     */
    private $widgetFactory;
    /**
     * 
     * @param string $tag
     */
    public function __construct(Tag $tagobj,WidgetFactory $widgetFactory){
        $this->tag = $tagobj->getTag();
        $this->tagObj = $tagobj;
        $tagobj->setTagAttr("text", "dddd");
        $this->widgetFactory = $widgetFactory;
    }
    /**
     * 
     */
    public function toString(){
        $strHtml = "";
        $attrArray = array();
        $widgets = $this->widgetFactory->getWidgetList();
        //$tagAttributeobj = $this->page->draw();
        $tagManage = PageFactory::getTagManage();
        $attrArray = $this->tagObj->getTagAttribute()->getAttrForOutput();
        $cssArray = $this->tagObj->getTagCss()->getOutputTagCssAttr();
        $path = PageFactory::getXmlPathByName("layout.widget.xml");
        $tagAttrManage = $this->tagObj->getTagAttribute()->getTagAttrManage();
        $tagCssManage = $this->tagObj->getTagCss()->getTagCssManage();
        $layout = new LayoutView($tagManage, $tagCssManage, $tagAttrManage, $path[1],true);
        $tab1 = $layout->getElementBySelector("#a1");
        $tab1ID = $tab1[0]->getSid();
        foreach ($attrArray as $key=>$value){
            $result = $this->widgetFactory->getWidgetManage()->recWidgetKey($key);
            if(!empty($result)){
              $tempWidget = $this->widgetFactory->createWidget($result);
              $tags = $tempWidget->getElementBySelector("input");
              $str=$tempWidget->widgetToString();
              if(empty($tags)){
                  continue;
              }else{
                  $tag = $tags[0];
              }
              $tag->setTagAttr("name",$key);
              $tag->setTagAttr("value",$value);
              $layout->addChildrenWidget($tab1ID, $tempWidget);
          }else{
              $comWidget = $this->widgetFactory->createWidget('com');
              $tags = $comWidget->getElementBySelector("input");
              $str=$comWidget->widgetToString();
              if(empty($tags)){
                  continue;
              }else{
                  $tag = $tags[0];
              }
              $tag->setTagAttr("name",$key);
              $tag->setTagAttr("value",$value);
              $layout->addChildrenWidget($tab1ID, $comWidget);
          }  
        }
        $tab1 = $layout->getElementBySelector("#a2");
        $tab1ID = $tab1[0]->getSid();
        foreach ($cssArray as $key=>$value){
            $result = $this->widgetFactory->getWidgetManage()->recWidgetKey($key);
            if(!empty($result)){
                $tempWidget = $this->widgetFactory->createWidget($result);
                $tags = $tempWidget->getElementBySelector("input");
                $str=$tempWidget->widgetToString();
                if(empty($tags)){
                    continue;
                }else{
                    $tag = $tags[0];
                }
                $tag->setTagAttr("name",$key);
                $tag->setTagAttr("value",$value);
                $layout->addChildrenWidget($tab1ID, $tempWidget);
            }else{
                $comWidget = $this->widgetFactory->createWidget('com');
                $tags = $comWidget->getElementBySelector("input");
                $str=$comWidget->widgetToString();
                //echo "<textarea>".$str."</textarea>";
                if(empty($tags)){
                    continue;
                }else{
                    $tag = $tags[0];
                }
                $tag->setTagAttr("name",$key);
                $tag->setTagAttr("value",$value);
                $layout->addChildrenWidget($tab1ID, $comWidget);
            }
        }
        return $layout->widgetToString();
    }
    
    
}

?>