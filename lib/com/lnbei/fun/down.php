<?php
//下载文件
//error_reporting(E_ALL);
define('IN_ADMIN',True);
require_once('include/common.php');
get_login($_USER->id);
$filenames = str_replace('..','',$_GET['urls']);

$filenames = str_replace('./','',$filenames);
$filenameGet = @$_GET['filename'];


    header("Content-type:text/html;charset=utf-8");  
      
        $filename = $filenameGet;  //文件名  
    $filename = iconv("utf-8","gb2312//IGNORE",$filename);  //转码  
    $file = $filenames;//"D:\\webserver\\www\\oa\\k.docx";  //文件路径  
    
	$len = filesize($file);  //文件大小  
        $file_extension = strtolower(substr(strrchr($filename,"."),1));  //文件后缀名  
   
    switch( $file_extension )   //判断文件类型  
    {  
      case "pdf": $ctype="application/pdf"; break;  
      case "exe": $ctype="application/octet-stream"; break;  
      case "zip": $ctype="application/zip"; break;  
      case "docx":  
      case "doc": $ctype="application/msword"; break;  
      case "xls": $ctype="application/vnd.ms-excel"; break;  
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;  
      case "gif": $ctype="image/gif"; break;  
      case "png": $ctype="image/png"; break;  
      case "jpeg":  
      case "jpg": $ctype="image/jpg"; break;  
      case "mp3": $ctype="audio/mpeg"; break;  
      case "wav": $ctype="audio/x-wav"; break;  
      case "mpeg":  
      case "mpg":  
      case "mpe": $ctype="video/mpeg"; break;  
      case "mov": $ctype="video/quicktime"; break;  
      case "avi": $ctype="video/x-msvideo"; break;  
   
      case "php":  
      case "htm":  
      case "html": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;  
   
      default: $ctype="application/force-download";  
    }  
   
    header("Pragma: public");  
    header("Expires: 0");  
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
    header("Cache-Control: public");   
    header("Content-Description: File Transfer");  
       
    header("Content-Type: $ctype");  
   
    $header="Content-Disposition: attachment; filename=".$filename.";";  
    header($header);  
    header("Content-Transfer-Encoding: binary");  
    header("Content-Length: ".$len);  
    readfile($file);  
?>

