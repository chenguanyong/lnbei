<?php
namespace com\lnbei\session;
class CGYID{
    public static function yuan($x){
    	$a=1000.0;
    	//$b=0;
    	$r=999.0;
    	$f=$r*$r;
    	$d=($x-$a)*($x-$a);
    	$ff=sqrt($f-$d);
    	return -floor($ff);
    }
    public static function yuan1($x){
    	$a=1000.0;
    	$r=999.0;
    	$f=$r*$r;
    	$d=($x-$a)*($x-$a);
    	$ff=sqrt($f-$d);
    	return floor($ff);
    }
    //echo yuan(500);
    public static function gy1($str){
    	$dcrc=crc32($str);
    	$dcrc=sprintf("%u",$dcrc);
    	$dcrc=" ".$dcrc;
    	$dcrc=substr($dcrc,-5);
    	$dcrc=floatval($dcrc);
    	$fd=array();//������16����
    	$fr=rand(1,1999);
    	$fy=-yuan($fr);//��Բ��-Yֵ
    	$s=" ";
    	$fda=array();
    	for($i=0;$i<strlen($str);$i++){
    		$fd[$i]=ord($str[$i]);
    		$fda[$i]=$fd[$i]^$dcrc;
    		$fda[$i]=$fda[$i]^$fy;
    		$rr="".$fda[$i];
    		$tt=strlen($rr);
    		$ds=substr($rr,-3,3);
    		$ffdd=substr($rr,0,strlen($rr)-3);
    		$s.=$ds;
    	}
    	return $s."#".$dcrc."#".$fr."#".$ffdd;
    }
    public static function gy2($str){
    	$str =rtrim($str);
    	$ff=array();
    	$a=0;
    	for($i=0;$i<strlen($str);$i++){
    		if($str[$i]=="#"){
    			$ff[$a]=$i;
    			$a++;
    		}
    	}
    	$dcrc=@substr($str,$ff[0]+1,$ff[1]-$ff[0]-1);//jiexicrc();
    	$fx=@substr($str,$ff[1]+1,$ff[2]-$ff[1]-1);//jiexifx;
    	$dds=@substr($str,$ff[2]+1);
    	$fx=floatval($fx);
    	$str=@substr($str,0,$ff[0]);
    	$dcrc=floatval($dcrc);
    	$fda=array();
    	$str=substr($str,1);
    	$qq=strlen($str);
    	$gg=$qq/3;
    	for($i=0,$a=0;$i<$gg;$i++){
    		$fda[$i]=substr($str,$a,3);
    		$a+=3;
    	}
    	$fy=yuan1($fx);
    	$fo=array();
    	$result="";
    	$dds=floatval($dds)*1000;
    	for($i=0;$i<count($fda);$i++){
    		$rre=rtrim($fda[$i]);
    		$fo[$i]=floatval($rre)+$dds;
    		$fo[$i]=$fo[$i]^$fy;
    		$fo[$i]=$fo[$i]^$dcrc;
    		$result.=chr($fo[$i]);
    	}
    	return rtrim($result);
    }
    /*
    session_start();
    echo $d=session_id();
    $fg1=gy1($d);
    echo "--------------------------------------\n";
    echo $fg1;
    echo "\n--------------------------";
    echo $s=gy2($fg1);
    if($d===$s)   echo "chengg";
    header("localhost:www.ff.com?f=".$fg1);*/
    public static function supergy1($str){
    	$g=rand(0,100);
    	$str=$str.$g;
        return	$r=gy1($str);
    }
    public static function supergy2($str){
    	$e=gy2($str);
    	$r=substr($e, -2);
    	return $r;
    }
}
//echo gy2("404394404421486397416487422399402419402419407485420419480397404486402404392481#31207#416#31");

////$f0=gy1("weewr3434ggggggggggggggggggggewwww4r4rwefe4rge4te4re4w3r2rw4trgt5e4ererdfzffr4wrwr43");
//echo gy2("404394404421486397416487422399402419402419407485420419480397404486402404392481#31207#416#31");
