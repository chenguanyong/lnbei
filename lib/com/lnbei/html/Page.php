<?php
namespace com\lnbei\html;

use com\lnbei\html\core\view\View;
use com\lnbei\html\core\data\output\OutputAttribute;
use com\lnbei\html\core\data\input\InputAttribute;
use com\lnbei\html\widget\Widget;
use com\lnbei\file\DirErgodic;
use com\lnbei\html\core\tool\Tool;
use com\lnbei\serialize\LBSerialize;
class Page extends Widget implements View
{
	private $parentHight;//宽
	private $parentWidget;//高
	private $X;//x坐标
	private $Y;//y坐标
	private $Z;//z坐标
	private $list;
	private $pageFactory;
	private $head;
	public function __construct(PageFactory $pageFactory){
	    $r = DirErgodic::ergodics("E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\template\\body",'body.widget.xml');
	    parent::__construct(PageFactory::getTagManage(), $pageFactory->getTagCssManage(), $pageFactory->getTagAttrManage(), $path=$r[1],true);
	    $this->list = array();
		$this->pageFactory = $pageFactory;
		$this->head = new HeadView(PageFactory::getTagManage(), $pageFactory->getTagCssManage(), $pageFactory->getTagAttrManage());
	}
	public function getParentHeight(){
		return $this->parentHight;
	}
	public function getParentWidth(){
		return $this->parentHight;
	}
	public function getX(){
		return $this->X;
	}
	public function getY(){
		return $this->Y;
	}
	public function getZ(){
		return $this->z;
	}
	public function setHeight($height){
		$this->height = $height;
	}
	public function setWidth($width){
		$this->width = $width;
	}
	public function setX($x){
		$this->X = $x;
	}
	public function setY($y){
		$this->Y = $y;
	}
	public function setZ($z){
		$this->z = $z;
	}
	public function getHead(){
	    return $this->head;
	}
	public function setHead(HeadView $head){
	    $this->head = $head;
	}
	//输出Html
	public function draw(){
	    $html = "<html>";
	    $html .= $this->head->toString();
		$body = $this->widgetToString();
		$html .= $body;
	    $html .= "</html>";
		return $html;
	}
	/**
	 * 获取属性选择对话框
	 * @param unknown $id
	 * @param unknown $pid
	 */
	public function getOutputString($id,$pid){
	   $tag =self::getTagByLBID($id,$pid);
	   $outPut = new OutputAttribute($tag);
	   return $outPut->toString();
	}
	/**
	 * 处理输入的属性和样式值
	 * @param string $id
	 * @param string $pid
	 * @param array $dataArray
	 */
	
	public function inputAttrAndCss($id,$pid,$dataArray){
	   $tag =self::getTagByLBID($id,$pid);
	   $input = new InputAttribute($tag);
	   return $input ->handleAttrAndCss($dataArray);
	}
	/**
	 * 编辑内容
	 * @param string $id 标签ID
	 * @param string $widgetID标签父ID
	 * @param string $str 内容
	 */
	public function editContent($id,$widgetID,$str){
	    $tag =self::getTagByLBID($id,$widgetID);
	    $input = new InputAttribute($tag);
	    return $input ->addContent($str);
	}
	/**
	 * 通过标签id 和 控件ID 获取 标签对象
	 * @param string $id
	 * @param string $widgetID
	 */
	public function getTagByLBID($id,$pid=''){
	    $tempObj = null;
	    /**
	     * 
	     * @var Wiget
	     */
	    $tempTag = self::getElementByLBID($id,$pid);
        return $tempTag;
	}
	/**
	 * 
	 * 保存页面
	 */
    public function serialize(){
        return LBSerialize::serialize($this);
    }
    public function unSerialize($objectStr){
        return LBSerialize::unSerialize($objectStr);
    }
    public function saveHTML(){
        return $this->widgetToString();
    }
    public function saveDoc(){
        
    }
    public function saveExcel(){
        
    }
    public function te(){
        return $this->widgetArray;
    }
}
?>