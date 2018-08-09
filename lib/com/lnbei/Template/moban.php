<?php
namespace com\lnbei\Template;
class file_option{
    private $file;
    private $path;
    public function __construct($path){
        
        $this->path = $path;
        if(is_file($path)){
        $this->file = fopen($this->path, 'ab+');
        }else{
            
            throw new Exception();
        }        
    }    
    //读文件
    public  function read(){
        $txt = "";

        if($this->file === false){throw  new Exception();}
        $txt = fread($this->file, filesize($this->path));
        if($txt === false) {throw new Exception();}
        
    
        return $txt;
    }
    //写文件
    public  function write($string){
        $handle =  $this->file;
    
        ftruncate($handle,0);
        $int_count = fwrite( $handle, $string);
        if($int_count === false){
            throw new Exception();
        }
    
        return $int_count;
    }
    //关闭文件句柄
    public  function close(){
    
        fclose($this->file);

    }    
}


$file = new file_option('D:\\apache2.4\\httpd-2.4.23-win64-VC14\\Apache24\\htdocs\\as\\test\\wen.html');

$txt = $file->read();
$file->close();

$patten_information = '/div_class=\"(?<div_class>[.\s\S]*?)\"/i';//淘宝教育通用
$int_return = preg_match_all($patten_information, $txt, $array_information);

//检查返回结果，匹配出错时退出运行
if($int_return === false){
    echo('正则表达式，匹配出错！' . PHP_EOL);
}

//检查返回结果，匹配出错时退出运行
if($int_return == 0){
    echo('正则表达式，没有匹配结果！' . PHP_EOL);
}
var_dump($array_information);

$g = strlen($array_information['div_class'][0]);
if( $g == 0 ){
    
    exit;
}
$rr = $array_information['div_class'][0];
$obj_array =array();
foreach ($array_information['div_class'] as $keys => $values){
$temp_obj_array = explode(";", $values);

foreach($temp_obj_array as $key => $value){
    if(strlen($value) == 0){
        
        break;
    }
    $attr_array = explode(',', $value);
    
    foreach ($attr_array as $attr_value){
        
        $value_array = explode(':', $attr_value);
        $obj_array[$keys][$key][$value_array[0]] = $value_array[1];
        
    } 
}
}
var_dump($obj_array);


//生成请求信息

class ExtractHtml{
    
    private $html;//待分离的HTML代码
    private $temp_object_array;
    public function __construct($html){
        $this->html = $html;
        $this->temp_object_array = array();
    }
    //
    //分离
    private function extract(){
        $patten_information = '/div_class=\"(?<div_class>[.\s\S]*?)\"/i';//淘宝教育通用
        $int_return = preg_match_all($patten_information, $this->html, $array_information);
        
        //检查返回结果，匹配出错时退出运行
        if($int_return === false){
            //echo('正则表达式，匹配出错！' . PHP_EOL);
            return false;
        }
        
        //检查返回结果，匹配出错时退出运行
        if($int_return == 0){
            //echo('正则表达式，没有匹配结果！' . PHP_EOL);
            return false;
        } 
        $this->temp_object_array = $array_information;
        return true;
        //return $array_information;
    }
    
    //转换
    private function parseObject(){
        
        $g = strlen($this->temp_object_array['div_class'][0]);
        if( $g == 0 ){
        
          return false;
        }
        $rr = $this->temp_object_array['div_class'][0];
        $obj_array =array();
        foreach ($this->temp_object_array['div_class'] as $keys => $values){
            $temp_obj_array = explode(";", $values);
        
            foreach($temp_obj_array as $key => $value){
                if(strlen($value) == 0){
        
                    break;
                }
                $attr_array = explode(',', $value);
        
                foreach ($attr_array as $attr_value){
        
                    $value_array = explode(':', $attr_value);
                    $obj_array[$keys][$key][$value_array[0]] = $value_array[1];
        
                }
            }
        }
        
       return $obj_array; 
    }
    //分离和转换
   public function  extract_prase_run(){
       
      $result = self::extract();
      if($result == false){
          return false;
      }
      $result = self::parseObject();
      if($result == false){
          
          return false;
      }
      return $this->temp_object_array;
   }
    
}

//解析从模板中产生的信息

class AnalyticObject{
    
    private $model ;//模板类型
    private $size ; //请求数据大小
    private $dataid;//分类id
    private $object;//数据对象
    private $doc;//文档处理
    private $html;//文本
    public function getMode(){
        return $this->model;
    }
    public function __construct($data_array, $html){
        
        $this->model = '0';  
        $this->size = '0';
        $this->dataid = '0';
        $this->object = $data_array;
        $this->html = $html;
        $return = self::init();
        if($return == false){
        
            throw new Exception();
        }
    }
    //初始化domMocument
    private function init(){
        
        $this->doc = new DOMDocument;
        $this->doc->encoding="utf-8";
        return  $return = $this->doc->loadHTML($this->html);

    }
    //生成求数据的信息
    public function BuildRequest($data_array){
        
        if(isset($data_array['model'])){
            
            $this->model = $data_array['model'];//模块类型
        }
        if(isset($data_array['size'])){
            
            $this ->size = $data_array['size'];//数据大小
        }
        if(isset($data_array['dataid'])){
            
            $this->dataid = $data_array['dataid'];
        }
        
        switch($this->model){
            
            case '0': return false;
            case '1':"dsd";break;
        }
        $request = '';
        return $request;
    }
    //解析
    private function Analytic($datas = array()){
        
        //第一层对象
        foreach ($this->object as $key=>$value){
            
            $str = self::BuildRequest($value[0]);
            if($this->model == '0'){
              $data = $datas ; 
              if(count($data) == 0){
                  
                  return false;
              }
            }else{
                
               $data = getRemote($str); 
            }
            $int_cont = count($value);
            
            for($i = 1; $i < $int_cont; $i++){               
                
                chilenObject($value[$i], $this->doc);            
            
            }                     
        }      
    }
    //处理善后
    public function Aftermath(){
        $txt = $this->doc->saveHTML();
        $patten_information = '/div_class=\"([.\S\s]*?)\"/i';//去除字符串中无用字符
        $result = preg_replace($patten_information, " ", $txt);
        if(is_array($result) || $result == null){
            
            $result = fasle;
        }
        
        return $result;
    }
    //处理子对象
    private function chilenObject($data, $doc=null, $fun = null){
        $id = null;
        $class = null;
        $size = null;
        $fun = null;
        if(isset($data['id'])){
        
            $id = $data['id'];//模块类型
            unset($data['id']);
        } 
        if(isset($data['class'])){
        
            $class = $data['class'];//模块类型
            unset($data['class']);
        }
        if(isset($data['fun'])){
        
            $fun = $data['fun'];//模块类型
            unset($data['fun']);
        }
        if(isset($data['size'])){
        
            $size = $data['size'];//模块类型
            unset($data['size']);
        }
        $last_data_array = array_values($data);
        $fun($id, $class, $size, $last_data_array);
        
    }
    //获取远程数据
    public function getRemote($request){
        
        
        return $array;
    }
    
    public function run($data){
        
        self::Analytic($data);
        
        return self::Aftermath();
        
    }
    //析构函数
    function __destruct(){
        
        $this->doc = null;
        
    }
    //
    
    

}


class ExecuteHtmlTrObject{
    public $TargetPath;//目标路径
    public $TemplatePath;//模板路径
    private $file;//文件操作对象
    private $extrahtml;//代码分离
    private $analytic;//代码处理
    public $type;//类型
    public function __construct($tarpath, $tempath, $type = 0){
        
        $this->TargetPath = $tarpath;
        $this->TemplatePath = $tempath;
        $this->file = new file_option($this->TemplatePath);
        $this->type = $type;
        //$this->extrahtml = new ExtractHtml($html)
    }
    public function init(){
        $html = $this->file->read();
        if($html == false){
            
            return false;
        }
        $this->extrahtml = new ExtractHtml($html);//初始化了分离HTML
        $object = $this->extrahtml->extract_prase_run();
        if($object == false){
            
            return false;
        }
        
        $this->analytic = new AnalyticObject($object, $html);
        $this->file->close();
    }
    public function run(){
        if($this->type == "0"){
            
         $html =    dowen();
        }else{
            
           $html = $this->analytic->run();
            
        }
        
        $file = new file_option($this->TargetPath);
        $file->write($html);
        $file->close();
    }
        //处理文章
        private function dowen(){
            
            $ass = getremm();
            foreach ($ass as $value){
                $this->analytic->run($value);
                
            }
        }
    
    
    
}


$doc = new DOMDocument;
//$doc->loadHTMLFile('wen.html');
$doc->encoding="utf-8";
$doc->loadHTML($txt);

 $doc->save("ffsss.html");  