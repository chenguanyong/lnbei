<?php
namespace com\lnbei\codebuilder\extend\lnbeis;
use com\lnbei\html\tag\Tag;
use com\lnbei\html\LayoutView;
/**
 * 创建增删改查视图
 * @author Administrator
 *
 */
class CURDView extends LnbeiAdapter
{
    /**
     * 布局文件路径
     * @var string
     */
    protected $layoutPath;
    /**
     * 布局类
     * @var LayoutView
     */
    protected $layoutView;
    /**
     * 标题
     * @var string
     */
    public $viewTile;
    /**
     * 确定按钮
     * @var array
     */
    public $viewSureButton;
    /**
     * 取消按钮
     * @var array
     */
    public $viewCancelButton;
    
    public function __construct($data,$path){
        parent::__construct($data);
        $this->layoutPath = $path;
        
    }
    
    public function doView($configData = array()){

        $this->layoutView = $this->pageFactory->createLayoutWidget($this->layoutPath);
        var_dump($this->layoutView->widgetToString());
      
        $html = "";
        foreach ($configData as $key=>$value){
            $tempWidget = $this->layoutView->getElementBySelector("#" . $key);
            if(!empty($tempWidget[0])){
                $tempWidget[0]->setContent($value);
            }
        }
        $body = $this->layoutView->getElementBySelector("#body");
   
        echo "<textarea>".$this->layoutView->widgetToString()."</textarea>";
        if(empty($body)){
            return null;
        }else{
            $body = $body[0];
        }
        echo "---------------->".PHP_EOL;
        var_dump($this->layoutPath);
       ECHO "<textarea>" . $body->reDraw() . "</textarea>";
      
       var_dump(count($this->dataArray));
       echo "<----------------".PHP_EOL;
       // exit();
        $UUID = $body->getTagAttr("UUID");
        $body->setContent("");
       
       var_dump($this->layoutView->widgetToString());
      //exit("dsds");
        foreach ($this->dataArray as $key=>$value){
            $widgetName = $this->getWidgetManage()->recWidgetKey($value["DATA_TYPE"]);
           // var_dump($widgetName);
            //continue;
            if(!empty($widgetName)){
                $tempWidget = $this->getWidgetFactory()->createWidget($widgetName);
                /**
                 * 
                 * @var Tag
                 */
                $label = $tempWidget->getElementBySelector("label");
                $label->setContent($value["com"]);//注释
                $tags = $tempWidget->getElementBySelector("input");
                //$str=$tempWidget->widgetToString();
               // echo "<textarea>".$str."</textarea>";
               // var_dump($tags);
                if(empty($tags)){
                    continue;
                }else{
                    $tag = $tags[0];
                }
                //exit;
                $tag->setTagAttr("name",$key);
                $tag->setTagAttr("value",$value);
                $this->layoutView->addChildrenWidget($UUID, $tempWidget);
            }else{
                //$label = $tempWidget->getElementBySelector("label");
                //$label->setContent($value["com"]);//注释
                $comWidget = $this->getWidgetFactory()->createWidget('kk');
               
                $tags = $comWidget->getElementBySelector("input");
                
                //$str=$comWidget->widgetToString();
               // echo "<textarea>".$str."</textarea>";
                //var_dump($tags);
                if(empty($tags)){
                    continue;
                }else{
                    $tag = $tags[0];
                }
                //exit;
                $tag->setTagAttr("name",$key);
                $tag->setTagAttr("value","a");
                var_dump($UUID);
                var_dump($comWidget->widgetToString());
            echo "ddd11";
                $this->layoutView->addChildrenWidget($UUID, $comWidget);
                var_dump($this->layoutView->widgetToString());
            }
        }
      $HTML = $this->layoutView->widgetToString();
      var_dump($HTML);
      echo "====><textarea>".$HTML."</textarea><====";

        return $HTML;//$this->layoutView->widgetToString();
    }
    
    public function initLayoutView(){
        
        
        
    }
}

?>