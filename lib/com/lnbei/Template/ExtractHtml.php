<?php
namespace com\lnbei\Template;
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
        return $result;
    }

}
