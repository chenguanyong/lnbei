<?php
//维护html文件中的路径问题
namespace com\lnbei\replacepathcss;
use com\lnbei\file\DirErgodic;
class HtmlPathFix{
    const  URL = '../';
    private $path;//路径
    private $rootPath;//根路径
    private $html;//待修改内容
    private $absulotionpath;//待修改文件的路径
    //初始化
    public function __construct($path, $root, $abpath, $html){
        
        $this->path = $path;
        $this->rootPath = $root;
        $this->html = $html;
        $this->absulotionpath = $abpath;
        
    }
    //设置目标路径
    public function setPath($path){
        
        if(is_dir($path)){
            $this->path=$path;  
        }else{
            throw new Exception();
        }
    }
    //设置根目录路径
    public function setRootPath($RPath){
        if(is_dir($RPath)){
            $this->rootPath = $RPath;
        }else{
            throw new Exception();
        }
    }
    //设置待修改内容
    public function setHtml($html){
        $this->html = $html;
    }
    //分析路径
    private function analysisPath(){
        
        $rootPath = explode('\\', $this->rootPath);
        $Path = explode('\\', $this->path);
        if(!is_array($rootPath)){
            return false;
        }
        if(!is_array($Path)){
            return false;
        }
        $array_red = count($Path) - count($rootPath);
        if($array_red <0){
            return false;
        }
        return $array_red;
    }
    
    //替换path
    public function replaceURL($txt){

        $url_count = self::analysisPath();
        if($url_count == false){
            return false;
        }
        $temp_url ='';
        for($i=0;$i<$url_count;$i++){
            
            $temp_url=$temp_url.self::URL;
        }
        $return_txt = str_replace(self::URL, $temp_url, $txt);
        
        if($return_txt == false){
            
            return fasle;
        }
        return $return_txt;
    }
    //搜索字符串
    function searchStr($str){
        $f=array();
        $i=0;
        $int_count = strlen($str);
        while($i<$int_count){
            if($i+1>$int_count){break;}
            if($i+2>$int_count){break;}
            if($str[$i]=='s'&&$str[$i+1]=='r'&&$str[$i+2]=='c'){
                echo "cheneee".$i.PHP_EOL;
                $o=self::smallWheil($i, $str);
                $g = substr($str, $i,$o-$i);
                $f[$g]=array($i,$o);
                $i = $o;
            }   
            if($i+3>$int_count){break;}
            if($str[$i]=='h'&&$str[$i+1]=='r'&&$str[$i+2]=='e'&&$str[$i+3]=='f'){
                echo "chen".$i.PHP_EOL;
                $o=self::smallWheil($i, $str);
                $g = substr($str, $i,$o-$i);
                $f[$g]=array($i,$o);
                $i = $o;
            }      
            $i++;
        }
        return $f;
    }
    //截取字符串
    function smallWheil($int, $str){
        $flog = 0;
        while($int>0){
            $p=$str[$int];
            if($str[$int]=='"'&&$flog==1){
                return $int;
            }
            if($str[$int]=='"'){$flog=1;}
            $int++;
        }
    }

    //分析url
    function analysisURL($str){
        $int_count = substr_count($str,":");
        if($int_count != 0){
         return false;
        }
        $str_array_ = explode('"', $str);
        $str_array = explode('/', $str_array_[1]);
        if(count($str_array_)<=1&&count($str_array)<=1){
            return false;
        }
        $path ="";
        foreach ($str_array as $tt){
        if($tt=='..'){continue;} 
        $path =$path. $tt.'/';
        }
        $path = substr($path, 0 ,strlen($path)-1);
        $v =   DirErgodic::ergodics($this->rootPath, $path);//根目录中搜索相关文件
        $path = str_replace("\\", '/', $v[1]);
        return $path; 
    }
    //运行修改html中路径问题
    function fixPathRun(){
        $src_href_path_array = self::searchStr($this->html);
        if(count($src_href_path_array)>0){
            return false;
        }
        foreach ($src_href_path_array as $key => $value){
            $path = str_replace("../", '', $key);
            $path = self::analysisURL($path);
            $path = self::buildAbsolatePath($path,$this->absulotionpath);
            $this->html = self::heBing($value[0], $value[1], $path);
        }
    }
    private function heBing($start,$end,$path){
        $start_str = substr($this->html,0, $start);
        $end_str = substr($this->html, $end);
        return $start_str . $path . $end_str;
    }

    //建立相对路径    
    private function buildAbsolatePath($mubiaopath,$location){
        
        if(!is_file($mubiaopath)&&!is_dir($location)){
            return false;
        }
        $mubiao_array = explode("\\", $mubiaopath);
        $location = explode("\\", $location);
        $i = 0;
        $location_count = count($location);
        $result_str = '';
        for($i=0; $i<$location_count;$i++){
            if($location[$i] == $mubiao_array[$i]){
                $result_str = $result_str . '\\' . $location[$i];
            }else{
                break;
            }
        } 
        $gg = substr($result_str, 1);
        $result_str = explode($gg, $mubiaopath);
        $all = $location_count - $i;
        while ($all){
           $result_str = "..\\" . $result_str[1];
           $all--;
        }
        return  $result_str;
    }

}

// buildAbsolatePath("G:\\t\\r\\htdocsj\\tt\\s\\jj\\image\\tx\\f.txt", "G:\\t\\r\\htdocsj\\tu");


// analysisURL('href=\"../../../tx/f.txt"');

// $str = "G:\\t\\r\\htdocsj\\tt\\s\\jj\\image/tx/f.txt";

// $f = str_replace("\\", '/', $str);
// echo $f;
// $str=<<<XML

// <a href="http://www.baidu.com">dsfsdf</a>
// </html>

// XML;
// //$t = new HtmlPathFix("G:\\t\\r\\htdocsj\\tt\\s\\jj\\u\\work\\shop.html", 'G:\\t\\r\\htdocsj\\tt\\s\\jj');

// //$t->replaceURL($rt);
// echo time().''.PHP_EOL;
// $patten_information = '/href/i';
// $int_return = preg_match_all($patten_information, $str, $array_information);
// echo count($array_information[0]);
// echo time().''.PHP_EOL;
// $t = str_word_count($str,2);
// echo time().''.PHP_EOL;
// ///echo time();
// //print_r($t);

// echo time().''.PHP_EOL;
// echo  count(ghi($str)[1]);
// var_dump(ghi($str)[1]);
// echo time().''.PHP_EOL;
