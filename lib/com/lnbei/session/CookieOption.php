<?php
namespace com\lnbei\session;
class CookieOption {
public static function setcookie1($key,$value,$time1){

	setcookie($key, $value, time()+$time1, "/", "localhost", 1);
}
public static function setcookie2($key,$value){

	setcookie1($key,$value,3600);
}
}