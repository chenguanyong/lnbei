<?php
//phpinfo();

// $html = require "G:\\linbei\\root\\phpace_dev\\lib\\com\\lnbei\\codebuilder\\controller\\template\\add.php";
// var_dump($html);
// $pattern = "/.*?/i";
// $int = preg_match_all($pattern,$html,$inf);
// var_dump($inf);

$pattern = '/@gh@/i';//替换表格插件的配置文件
$replacement = json_encode(array("jkh"=>"1234223"));
$gh = preg_replace($pattern, $replacement, "sadfasdfasdf@gh@sdfad");
var_dump($gh);