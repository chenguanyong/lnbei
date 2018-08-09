<?php
namespace com\lnbei\codebuilder;

use com\lnbei\codebuilder\Config;
use com\lnbei\file\File;
class Builder
{
    /**
     * 默认的文件名后缀
     * @var unknown
     */
    protected $defaultSuffix = "Model";
    /**
     * 文件的后缀
     * @var unknown
     */
    protected $extension = "php";
    /**
     * php文件开始标志
     * @var string
     */
    protected $startPhpFlag = "<?php";
    /**
     * php文件结束标志
     * @var string
     */
    protected $endPhpFlag = "?>";
    /**
     * mvc功能文件
     * @var string
     */
    protected $mvcFolder = "view";
    /**
     * 模块名
     * @var unknown
     */
    protected $module;//模块名
    protected $className;//类名称
    protected $appPath;//应用路径
    protected $extensionHtml;//视图文件后缀
    /**
     * 构造函数
     */
    public function __construct($className=""){
        $this->defaultSuffix = Config::$dataArray["DefaultSuffix"];
        $this->startPhpFlag = Config::$dataArray["StartPhpFlag"];
        $this->endPhpFlag = Config::$dataArray["EndPhpFlag"];
        $this->extension = Config::$dataArray["Extension"];
        $this->extensionHtml = Config::$dataArray["ExtensionHtml"];
        $this->mvcFolder = Config::$dataArray["MvcFolder"];
        $this->module = Config::$dataArray["Module"];
        $this->appPath = Config::$dataArray["APPPath"];
        $this->className = $className;
    }
    /**
     * 输出到指定文件
     * @param string $filePath
     * @param string $str
     */
    protected function saveFile($filePath, $str){
        $str = $this->startPhpFlag . PHP_EOL . $str;
        $str .= PHP_EOL . $this->endPhpFlag;
        $int = File::fWriteCcontex($filePath, $str);
        return $int > 0 ? true : false;
    }
    /**
     * 拼接路径
     */
    protected function spellPath(){
        $path = $this->appPath . "\\" . $this->module . "\\" . $this->mvcFolder . "\\";
        $path .= ucfirst($this->className).$this->defaultSuffix . "." . $this->extension;
        return $path;
    }
    /**
     * 拼接视图路径
     */
    protected function spellPathView($controller,$methods){
        $fileName = explode("_",$controller);
        if(count($fileName) == 2){
            $controller = $fileName[1];
        }
        $path = $this->appPath . "\\" . $this->module . "\\" . $this->mvcFolder . "\\";
        $path .= ucfirst($controller) . "\\". $methods . "." . $this->extensionHtml;
        return $path;
    }
    /**
     * 替换
     * @param string $search
     * @param string $replace
     * @param string $subject
     */
    protected function replace($search , $replace , $subject ){
        return str_replace($search, $replace, $subject);
    }
    /**
     * 生成模型类的引用空间的字符串
     */
    protected function BuildModelNamespaceStr($table){
      return $path = "app" . "\\" .$this->module . "\\" . "model" . "\\" . $table . "Model" ;
    }
}

?>