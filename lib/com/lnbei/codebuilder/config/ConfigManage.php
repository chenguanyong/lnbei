<?php
namespace com\lnbei\codebuilder\config;
use com\lnbei\file\File;
use com\lnbei\xml\Xmliteration;
use com\lnbei\html\core\data\ContentIterator;
use com\lnbei\html\core\tool\ArrayIterator;
class ConfigManage
{
    /**
     * 存储标签属性
     * array("common"=>
     *              array("id"=>"string",
     *              "attr"=>array(),
     *              "id"=>"string",
     *              "pid"=>"string",
     *              "tag"=>"string",
     *              "content"=>"string",
     *              "childenTag"=>array(
     *                  "attr"=>array(
     *                      "id"=>"string",
     *                      "attr"=>array(),
     *                      "pid"=>"string",
     *                      "tag"=>"string",
     *                      "content"=>"string",
     *                      )
     *                      ,...
     *                  )
     *              ),
     *              ....
     * )
     * @var array
     */
    private $attrArray;
    /**
     * 标签模板路径
     * @var string
     */
    private $path;
    /**
     * 构造函数
     * @param string $path
     * @param string $bool
     */
    public function __construct($path,$bool = false){
        $this->attrArray = array();
        $this->path = $path;
        if($bool){
            self::init();
        }
    }
    /**
     * 初始化方法 
     */
    private function init(){
        $xmlstr = '';
        try {
            $xmlstr = File::fReadContex($this->path);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        $mTagAttrManage = new ConfigXmlIteratorCallback();
        $xmllteration = new Xmliteration($xmlstr);
        $xmllteration->literation($mTagAttrManage);
        $attrArray = $mTagAttrManage->getAttrArray();
        $contentIterator = new ArrayIterator($attrArray);
        $onekey = '';
        $onekey=array_keys($attrArray)[0];
        if(empty($onekey)){
           throw new \Exception();
        }
        $contentIterator->getIterator($onekey,$mTagAttrManage);
        $this->attrArray = $mTagAttrManage->getItrtatorArray();
        //var_dump($this->attrArray);
    }
    /**
     * 获取标签所有的属性
     * @param string $tag
     */
    public function getAttr(){
        if(empty($this->attrArray)){
            return null;
        }else{
            return $this->attrArray;
        }
    }
   
}

?>