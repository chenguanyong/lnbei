<?php
namespace com\lnbei\network;

class IPOption{
    /*
    *根据域名获取IP地址
    *@return null
    *@auth cgy
    */
    function setIp(){
       $ip=gethostbyname(conf::$temp_host_ip);
       try{
       $ip_txt=  fopen("ip.txt", "w");
       fwrite($ip_txt, $ip);
       }catch (Exception $g){
         return '';
       }
       fclose($ip_txt);
    }
    /*
    *
    *@return ip
    *@auth 
    */
    function getIp(){
       $ip_txt=fopen("ip.txt", "rb");
       $ip=fread($ip_txt, 12);
       fclose($ip_txt);
       return $ip;
    }
}