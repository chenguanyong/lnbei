<?php
//替换html中 的css代码
namespace com\lnbei\replacepathcss;
class ExtractCss{
    public  function __construct(){}
    //开始执行
    public  static  function run($str,$filePath){
        $patten_information = '/<[A-Z,a-z,0-9,^\/]*?[\s\S]*?class=\"(?<class>.*?)\"[\s\S]*?style=\"(?<style>.*?)\"[.\s\S]*?>?|<[A-Z,a-z,0-9]*?[\s\S]*?style=\"(?<style1>.*?)\"[\s\S]*?class=\"(?<class1>.*?)\"[.\s\S]*?>?/i';
        $int_return = preg_match_all($patten_information, $str, $array_information);
        //妫�鏌ヨ繑鍥炵粨鏋滐紝鍖归厤鍑洪敊鏃堕��鍑鸿繍琛�
        if($int_return === false){
            // echo_and_go('get_information()锛氭鍒欒〃杈惧紡锛屽尮閰嶅嚭閿欙紒' . PHP_EOL);
            return false;
        }
        //妫�鏌ヨ繑鍥炵粨鏋滐紝鍖归厤鍑洪敊鏃堕��鍑鸿繍琛�
        if($int_return == 0){
            //echo_and_go('get_information()锛氭鍒欒〃杈惧紡锛屾病鏈夊尮閰嶇粨鏋滐紒' . PHP_EOL);
            return false;
        }
        $file = fopen($filePath,'wb+');
        $int_count = count($array_information['style1']);
        for($i = 0; $i<$int_count;$i++){
            if($array_information['style'][$i]!=''&&$array_information['class'][$i]!=''){
                $strr = '.'.$array_information['class'][$i].'{'.$array_information['style'][$i].'}'.PHP_EOL;
                fwrite($file, $strr);
            }
        }
        $int_count = count($array_information['style1']);
        for($i = 0; $i<$int_count;$i++){
            if($array_information['style1'][$i]!=''&&$array_information['class1'][$i]!=''){
                $strr = '.'.$array_information['class1'][$i].'{'.$array_information['style1'][$i].'}'.PHP_EOL;
                fwrite($file, $strr);
            }
        }
        fclose($file);
    }
}