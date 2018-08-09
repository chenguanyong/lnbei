<?php
namespace com\lnbei\Template;
class DOMHtmlTemp {
    function __construct() {
        ;
    }
    
    /*
     * 
     * 
     * $id:表示标签id号
     * $class：表示css类
     * $size:数据大小
     * $datas:表示数据块
     * $xml:表示操作dom文档的句柄
     * $last_data_array ：表示剩下的标签对象
     *  */
    
    
public static function build_li($id, $class=NULL, $size=0, $datas=array(), $xml=null, $last_data_array=array()){
   
    $ul = $xml->getElementById($id);
    $classs = explode("#", $class);
    $class_array = array();
    $classli = explode("@", $classs[0]);
    $class_array[$classli[0]] = $classli[1];
    $classli = explode("@", $classs[1]);
    $class_array[$classli[2]] = $classli[3];
    if($size >= count($datas)){
        
        $size = count($datas);
        
    }
    for($i=0; $i < $size; $i++){
        $div=$xml->createElement("li");
        //$div->setAttribute("id", "sds");
        $div->setAttribute("class", $class_array['li']);   
        $a=$xml->createElement("a");
        $a->setAttribute("class",$class_array['a']);
        $a->setAttribute("href",$datas[0]);
        $a->nodeValue=$datas[1];
        $div->appendChild($a);
        $ul->appendChild($div);
    }
    
}

public static function build_a($id, $class=NULL, $size=0, $datas=array(), $xml=null, $last_data_array=array()){
     
    $ul = $xml->getElementById($id);
    $classs = explode("#", $class);
    $class_array = array();
    $classli = explode("@", $classs[0]);
    $class_array[$classli[0]] = $classli[1];
    if($size >= count($datas)){

        $size = count($datas);

    }
    for($i=0; $i < $size; $i++){

        $a=$xml->createElement("a");
        $a->setAttribute("class",$class_array['a']);
        $a->setAttribute("href",$datas[0]);
        $a->nodeValue=$datas[1];
        
        $ul->appendChild($a);
    }

}
}
