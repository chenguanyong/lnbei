<?php
namespace com\lnbei\html\tag;
use com\lnbei\html\tag\TagInterface;
use com\lnbei\html\core\data\attribute\TagAttribute;
use com\lnbei\html\core\data\css\TagCss;
use com\lnbei\html\core\tool\Tool;
use com\lnbei\html\core\config\ControlCommand;
/**
 * html标签php化
 * 根父类
 * @author Administrator
 *
 */

class Tag implements TagInterface
{   
    protected $onclick= null;//属性
    protected $ondblclick= null;//双击
    protected $onkeydown= null;//键盘事件
    protected $onmousedown= null;//鼠标事件
    protected $onmousemove= null;//鼠标事件
    protected $onmouseout= null;//鼠标事件
    protected $onmouseover= null;//鼠标事件
    protected $id = '';//id属性
    protected $name = '';//名称属性
    protected $content = null;
    protected $width=0; //控件的宽
    protected $height=0;//控件的长
    protected $css = '';//css类
    protected $style = '';//自定义css样式
    protected $attr= null;//属性
    protected $tag = 'body';
    private $version = '0.0.0';//版本信息
    private $sid = 0;//自己ID
    private $parent = 0;//父ID
    private $tagAttribute;//标签属性类
    private $tagCss;//样式属性类
    private $xid;//标签在本空件中的数字id
    private $xpid;//标签的父级ID
    private $tempContent;//生成html文件是临时文件
    private $rule;//规则对象
    /**
     * 标签类型
     * 1：正常型；例如：<a></a>2：非闭合型<a />
     * 3:不闭合型 <a >
     * @var int
     */
    protected $tagType = 1;
    //初始化
    public function __construct(TagAttribute $tagAttribute,TagCss $tagCss,array $dataArray){
        $this->height = 0;
        $this->width = 0;
        $this->css = '';
        $this->style="";
        $this->attr =array();
        $this->id="";
        $this->name="";
        $this->tagAttribute = $tagAttribute;
        $this->tagCss = $tagCss;
        $this->xid = $dataArray['xid'];
        $this->xpid = $dataArray['xpid'];
        $this->content = $dataArray['content'];
        $this->rule = $dataArray['rule'];
        self::init($dataArray);
    }  

    private function init($dataArray){
        $this->sid = $dataArray['id'];
        $this->parent = $dataArray['pid'];
    
    }
    /**
     * 
     */
    public function getXid(){
        return $this->xid;
    }
    /**
     * 
     */
    public function getXPid(){
        return $this->xpid;
    }
    /**
     * 
     */
    public function getName(){
        return $this->name = self::getTagAttrFromTagAttribute("name");//$this->tagAttribute->getAttr("name");
    }
    /**
     * 
     * @param string $value
     */
    public function setName($value){
        $this->name = $value;
        self::setTagAttr("name", $value);
    }
    /**
     *
     */
    public function getOnclick(){
        return $this->onclick = self::getTagAttrFromTagAttribute("onclick");//$this->tagAttribute->getAttr("onclick");
    }
    /**
     *
     * @param string $value
     */
    public function setOnclick($value){
        $this->onclick = $value;
         self::setTagAttr("onclick", $value);
    }
    /**
     *
     */
    public function getOndblclick(){
        return $this->ondblclick = self::getTagAttrFromTagAttribute("ondblclick"); //$this->tagAttribute->getAttr("ondblclick");
    }
    /**
     *
     * @param string $value
     */
    public function setOndblclick($value){
        $this->ondblclick = $value;
        self::setTagAttr("ondblclick", $value);
    }
    /**
     *
     */
    public function getOnkeydown(){
        return $this->onkeydown = self::getTagAttrFromTagAttribute("onkeydown");//$this->tagAttribute->getAttr("onkeydown");
    }
    /**
     *
     * @param string $value
     */
    public function setOnkeydown($value){
        $this->onkeydown = $value;
        self::setTagAttr("onkeydown", $value);
    }
    /**
     *
     */
    public function getOnmousedown(){
        return $this->onmousedown = self::getTagAttrFromTagAttribute("onmousedown");//$this->tagAttribute->getAttr("onmousedown");
    }
    /**
     *
     * @param string $value
     */
    public function setOnmousedown($value){
        $this->onmousedown = $value;
        self::setTagAttr("onmousedown", $value);
    }
    /**
     *
     */
    public function getOnmousemove(){
        return $this->onmousemove = self::getTagAttrFromTagAttribute("onmousemove");//  $this->tagAttribute->getAttr("onmousemove");
    }
    /**
     *
     * @param string $value
     */
    public function setOnmousemove($value){
        $this->onmousemove = $value;
        self::setTagAttr("onmousemove", $value);
    }
    /**
     *
     */
    public function getOnmouseout(){
        return $this->onmouseout = self::getTagAttrFromTagAttribute("onmouseout");// $this->tagAttribute->getAttr("onmouseout");
    }
    /**
     *
     * @param string $value
     */
    public function setOnmouseout($value){
        $this->onmouseout = $value;
        self::setTagAttr("onmouseout", $value);
    }
    /**
     *
     */
    public function getOnmouseover(){
        return $this->onmouseover = self::getTagAttrFromTagAttribute("onmouseover");// $this->tagAttribute->getAttr();
    }
    /**
     *
     * @param string $value
     */
    public function setOnmouseover($value){
        $this->onmouseover = $value;
        self::setTagAttr("onmouseover", $value);
    }
    /**
     *
     */
    public function getID(){
        return $this->id = self::getTagAttrFromTagAttribute("id");//$this->tagAttribute->getAttr("id");
    }
    /**
     *
     * @param string $value
     */
    public function setID($value){
        $this->id = $value;
        self::setTagAttr("id", $value);
    }

    public function setTagAttribute($tagAttribute){
        $this->tagAttribute = $tagAttribute;
    }
    public function getTagAttribute(){
        return $this->tagAttribute;
    }
    public function setTagCss($tagCss){
        $this->tagCss = $tagCss;
    }
    public function getTagCss(){
        return $this->tagCss;
    }
    /**
     * 设置标签内容
     */
    public function setContent($content){
       $this->content = $content; 
    }
    /**
     * 获取标签内容
     */
    public function getContent(){
        return $this->content;
    }
    /**
     * 获取当前对象的ID
     */
    public function getSid(){
        return $this->sid;
    }
    public function setSid($sid){
        $this->sid = $sid;
    }
    public function getParent(){
        return $this->parent;
    }
    public function setParent($parent){
        $this->parent = $parent;
    }
    /**
     * css样式类
     * @return string
     */
    public function getCss(){
        return $this->css = self::getTagAttrFromTagAttribute('css');
    }
    public function getStyle(){
        return $this->style = self::getTagAttrFromTagAttribute('style');
    }
    /**
     * 获取标签所有属性
     */
    public function getAttr(){
        return $this->attr;
    }
    public function getWidth(){
        return $this->width = self::getTagCssFromTagCssByKey('width');
    }
    public function getHeight(){
        return $this->height = self::getTagCssFromTagCssByKey('height');;
    }
    public function setCss($value = ''){
        $this->css = $value;
        self::setTagAttr("css", $value);
    }
    public function setStyle($value = ''){
        $this->style = $value;
        self::setTagAttr("css", $value);
    }
    /**
     * 设置标签所有属性
     * @param array $value
     */
    public function setAttr($value = array()){
        $this->attr = $value;
    }
    public function setTagAttr($key, $value){
        $this->tagAttribute->setAttr($key, $value);
    }
    public function getTagAttr($key){
        return  $this->tagAttribute->getAttr($key);
    }
    public function setTagCssValue($key, $value){
        $this->tagCss->setCss($key, $value);
    }
    public function getTagCssValue($key){
       return $this->tagCss->getCss($key);//Css($key, $value);
    }
    public function setWidth($value = ''){
        $this->width = $value;
        self::setTagCssValue('width', $value);
    }
    public function setHeight($value = ''){
        $this->height = $value;
        self::setTagCssValue('height', $value);
    }
    /**
     * 获取标签名
     */
    public function getTag(){
        return $this->tag;
    }
    //标签开始
    protected function start(){
        if($this->tagType == 4){
            return '';
        }
        return '<' . $this->tag .' ';
    }
    //绘画
    protected function draw(){
        self::doControlCommand();
        $html = self::start();
        $attrStr = $this->tagAttribute->toString();
        $cssStr = $this->tagCss->toString();
        $html .= self::attr($attrStr,$cssStr);
       // $html = self::emptAttr($html);
       // $html = self::onEvent($html);
       // $html = self::emptOnEvent($html);
        $html = self::content($html);
        $html = self::end($html);
        $this->tempContent = '';
        return $html;
    }
    //empt空方法
    protected function emptAttr($html){
        return $html;
    }
    //empt空方法
    protected function emptOnEvent($html){
        return $html;
    }

    //结束
    protected function end($html){
        if($this->tagType == 4){
            return $html;
        }
        if($this->tagType == 1){
            return $html . '/' . $this->tag . '>' . PHP_EOL;
        }else{
            return $html;
        }
    }
    //属性
    protected function attr($attr,$css){
        if($this->tagType == 4){
            return '';
        }
        $html = $attr ;//. '  style="' . $css . '" ';
        if(!empty($css)){
            $html .= '  style="' . $css . '" ';
        }
        return $html;
    }
    //内容
    protected function content($html){
        //$this->tempContent = "";
        switch($this->tagType){
            case 1:{
                if(!empty($this->content)){
                    $html = $html . ' >' . $this->tempContent . $this->content. '<';
                }else{
                    $html = $html . ' >' .$this->tempContent. '<';
                } 
            }break;
            case 2:{
                $html = $html . ' />' . PHP_EOL;// 
            }break;
            case 3:{
                $html = $html . ' > ' . PHP_EOL;
            }break;
            case 4:{
                $html = $html . $this->tempContent . $this->content  . PHP_EOL;
            }break;
        }
        return $html;
    }
    //事件
    protected function onEvent($html){
        if(!empty($this->onclick)){
            $html = $html . 'onclick="' . $this->onclick . '" ';
        }
        if(!empty($this->ondblclick)){
            $html = $html . 'ondblclick="' . $this->ondblclick . '" ';
        }
        if(!empty($this->onkeydown)){
            $html = $html . 'onkeydown="' . $this->onkeydown . '" ';
        }
        if(!empty($this->onmousedown)){
            $html = $html . 'onmousedown="' . $this->onmousedown . '" ';
        }
        if(!empty($this->onmousemove)){
            $html = $html . 'onmousemove="' . $this->onmousemove . '" ';
        }
        if(!empty($this->onmouseout)){
            $html = $html . 'onmouseout="' . $this->onmouseout . '" ';
        }
        if(!empty($this->onmouseover)){
            $html = $html . 'onmouseover="' . $this->onmouseover . '" ';
        }
        return $html;
    }
    //生成自定义属性
    protected function buildStyle(){
      if(count($this->style) == 0){return null;}
      $attr = null;
      foreach ($this->style as $key=>$value){
          if(empty($value)){
              continue;
          }
           $attr = $key . ":" . $value . "; ";
      }
      return $attr;  
    }
    //生成自定义属性
    protected function buildAttr(){
        if(count($this->attr) == 0){return null;}
        $attr = null;
        foreach ($this->attr as $key=>$value){
            if(empty($value)){
                continue;
            }
            $attr = $key . '="' . $value . '"  ';
        }
        return $attr;
    }
    //添加内容
    public function addContet($str){
        $this->content .= $str;
    }
    /**
     * 设置标签
     */
    public function setTagName($tagName){
        
        $this->tag = $tagName;
    }
    protected function getTagAttrFromTagAttribute($key){
        return $this->tagAttribute->getAttr($key);
    }
    protected function getTagCssFromTagCssByKey($key){
        return $this->tagCss->getCss($key);
    }
    /**
     * 复制对象
     */
    public function copyTag(){
        $tagName = $this->tag;
        $dataArray = array(
            'xid'=>$this->id,//Tool::random(),
            'xpid'=>$this->xpid,
            'content'=>'',
            'id'=>Tool::random(),
            'pid'=>$this->parent
        );
        $tagAttribute = new TagAttribute(array(),$tagName,$this->tagAttribute->getTagAttrManage());
        $tagCss = new TagCss(array(),$tagName,$this->tagCss->getTagCssManage());
        $tag = new $tagName($tagAttribute,$tagCss,$dataArray);
        return $tag;
    }
    /**
     * 处理系统命令
     */
    private function doControlCommand(){
        if(ControlCommand::$isShowID == 1){
            self::setTagAttr("UUID",$this->sid);
        }
        if(ControlCommand::$isShowParentID == 1){
            self::setTagAttr("PUUID",$this->parent);
        }
    }
    /**
     * 
     */
    public function toString(){
        return self::draw();
    }
    public function setTempContent($tempHtml){
        $this->tempContent = $tempHtml;
    }
    public function unSetAttr($key){
        $this->tagAttribute->unSetAttr($key);
    }
    public function unSetCss($key){
        $this->tagCss->unSetCss($key);
    }
    /**
     * 处理规则
     */
    public function runRule(){
        $rule = $this->rule->getRuleById($this->parent,$this->sid);
        foreach ($rule as $k=>$v){
            $obj = $this->rule->selectAction($k);
            $obj->doAction($this,$v);//执行
        }
    }
}

?>