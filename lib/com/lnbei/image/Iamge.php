<?php
namespace com\lnbei\image;
  class Iamge{
	public function __construct(){}
    public static function randImage(){
		$ff=array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$result=NULL;
		//header("Content-type: image/png");
		//header("Content-type: text/html");
		$im=@imagecreate(100,30)or die("sds");
		$background=imagecolorallocate($im,0,0,0);
		$fg=0;
		for($i=0;$i<4;$i++){
			$fd=rand(0,35);
			$fa=$ff[$fd];
			$result.=$fa;
			$textcolor=imagecolorallocate($im,rand(0,255),43,rand(0,255));
			imagechar($im,5,$fg,0,$fa,$textcolor);
			$fg=$fg+rand(10,25);
		}
		$ft=rand(1000,9999);
		$ds=array($result,$ft);
		//header("content-type:image/png\r\n");
		imagepng($im,"..\image\check_image\\".$ft.".png");
		//imagepng($im);
		//imagepng($im);
		imagedestroy($im);
		return $ds;
	}
	// randimage();
    public static function yuan($ffd){
		$im = imagecreate(500,650);
		$string = 'Note that the first letter is a N';
		$x=200;
		$y=200;
		$h=350;
		$start=0;
		$end=360;
		$f=0;
		$bg = imagecolorallocate($im, 255, 20, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$bla = imagecolorallocate($im, 255, 0,0 );$f11=true;
		$fd=0;
		for($i=0;$i<count($ffd);$i++){
			$fd+=$ffd[$i][1];
		}
	
		for($i=0;$i<count($ffd);$i++){
			$f11=!$f11;
			if($f11){
				imagefilledarc($im, $x,$y,$h,$h,$f,$f=$f+$ffd[$i][1]/$fd*360, $bla, IMG_ARC_PIE );
			}else {
			    imagefilledarc($im, $x,$y,$h,$h,$f,$f=$f+$ffd[$i][1]/$fd*360, $black, IMG_ARC_PIE );
			}
		}
		//echo 30.4/100*360;
		//header('Content-type: image/png');
		imagepng($im);
	}
	//$ffdd=array(array("1",60),array("1",60),array("1",60),array("1",60),array("1",60),array("1",60));
//ff($ffdd);
	public static function tiaoXing($ffd){
		$fq=0;
		foreach($ffd as $r){
			$fq+=$r[1];
		}
		//$fq=$fq*1.0;
		$fq;
		$tx=500;
		$ty1=500;
		$im = imagecreate($tx,$ty1);
		$string = 'Note that the first letter is a N';
		$x1=20;
		//$x2=160;
		$y1=20;
		//$y2=120;
		$sj=3;
		$sh=6;
		$t1=16;
		//$x1=20;
		$x2=ceil($tx*0.8);
		//$y1=20;
		$y2=ceil($ty1*0.8);//
		//$sj=3;
		//$sh=6;
		//$t1=16;
		$fj=$y2-$y1;
		$fz=($x2-$x1)/count($ffd);
		$bg = imagecolorallocate($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$bla = imagecolorallocate($im, 130, 133, 199);
		imageline($im,$x1,$y1,$x1,$y2,$black);
		imageline($im,$x1,$y2,$x2,$y2,$black);
		imagepolygon($im,
				array (
						$x1-$sj, $y1,
						$x1,$y1-$sh,
						$x1+$sj, $y1
				),
				3,
				$black);
		imagepolygon($im,
				array (
						$x2, $y2-$sj,
						$x2, $y2+$sj,
						$x2+$sh, $y2
				),
				3,
				$black);
		imagestring($im, 2, $x1-$t1, $y1+3,$fq, $black);
		imagestring($im, 2, $x1-$t1, $y2-50,ceil($fq/2), $black);
		$fv=25;
		$fy=0;
		$f=true;
		for($i=0;$i<count($ffd);$i++){
	
			$fy=$fj*(1-($ffd[$i][1]/$fq))+$y1;;
			imagestring($im, 3, $fv,$fy-13,$ffd[$i][1], $bla);
			$f=!$f;
			if($f){
				imagefilledrectangle($im,$fv,$fy,$fv+5,$y2,$black);}
				else imagefilledrectangle($im,$fv,$fy,$fv+5,$y2,$bla);
				imagestring($im, 3, $fv+2,$y2+1,$ffd[$i][0], $black);
				$fv+=$fz;
				$fy=0;
	
		}
	
		// prints a black "Z" on a white background
	
		//imagestring($im, 4, 4, 142,"30", $black);
		//imagestring($im, 2, 30,121,"30", $black);
	
		//imagestring($im, 4,142,189,"100", $black);
	
		//header('Content-type: image/png');
		$re=	rand(1000,9999);
		imagepng($im,$re.".png");
	return $re;
	}
	
//iamge_opt::	zhexiantu(array());
	
public static function zheXianTu($ffd){
	//print_r($ffd);	
	//echo "a";
	    $fq=0;
		foreach($ffd as $r){
			$fq+=$r[1];
		}
		//$fq=$fq*1.0;
		$fq;
		$tx=500;
		$ty1=500;
		$im = imagecreate($tx,$ty1);
		//$string = 'Note that the first letter is a N';
		$x1=20;
		$x2=ceil($tx*0.8);
		$y1=20;
		$y2=ceil($ty1*0.8);//
		$sj=3;
		$sh=6;
		$t1=16;
		$fj=$y2-$y1;
		$fz=($x2-$x1)/count($ffd);
		$bg = imagecolorallocate($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$bla = imagecolorallocate($im, 130, 133, 199);
		imageline($im,$x1,$y1,$x1,$y2,$black);
		imageline($im,$x1,$y2,$x2,$y2,$black);
		imagepolygon($im,
				array (
						$x1-$sj, $y1,
						$x1,$y1-$sh,
						$x1+$sj, $y1
				),
				3,
				$black);
		imagepolygon($im,
				array (
						$x2, $y2-$sj,
						$x2, $y2+$sj,
						$x2+$sh, $y2
				),
				3,
				$black);
		imagestring($im, 2, $x1-$t1, $y1+3,$fq, $black);
		//$gg=
		imagestring($im, 2, $x1-$t1, ($y2-$y1)/2+$y1,ceil($fq/2), $black);
		$fv=25;
		$fy=0;
		$f=true;
		$fw=$fj*(1-($ffd[0][1]/$fq))+$y1;
		imagestring($im, 3, $fv,$fw-13,$ffd[0][1], $bla);
		imagestring($im, 3, $fv+2,$y2+1,$ffd[0][0], $black);
		for($i=1;$i<count($ffd);$i++){
			$fv+=$fz;
			$fy=$fj*(1-($ffd[$i][1]/$fq))+$y1;
			//$fy=120-$ffd[$i+1][1];
			imagestring($im, 3, $fv,$fy-13,$ffd[$i][1], $bla);
			imageline($im,$fv-$fz,$fw,$fv,$fy,$bla);
			// imagefilledrectangle($im,$fv,$fy,$fv+5,120,$bla);
			$fw=$fy;
			imagestring($im, 3, $fv+2,$y2+1,$ffd[$i][0], $black);
			$fy=0;
		}
	
		// prints a black "Z" on a white background
	
		//imagestring($im, 4, 4, 142,"30", $black);
		//imagestring($im, 2, 30,121,"30", $black);
	
		//imagestring($im, 4,142,189,"100", $black);
		imagestring($im, 5, ceil($tx*0.7),ceil($ty1*0.05),"����ͼ", $black);
		//header('Content-type: image/png');
	    $re=rand(1000,9999);
		imagepng($im,$re.".png");
	    return $re;
	}	
}
//iamge_opt::	zhexiantu(array(array("1",60),array("1",60),array("1",60),array("1",60),array("1",60),array("1",60)));
//echo iamge_opt::randimage();
class CheckCode{
	
	private $image;//图片句柄
	private $code; //图片验证码
	public function __construct(){
		
		$this ->image = @imagecreate(100,30)or die("sds");
		$this ->code ='';
		}
	public function createImage(){
		
		$ff=array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$background=imagecolorallocate($this ->image,0,0,0);
		$result = '';
		$fg=0;
		for($i=0; $i < 4; $i++){
			$fd = rand(0, 35);
			$fa = $ff[$fd];
			$result .= $fa;
			$textcolor = imagecolorallocate($this ->image, rand(0, 255), 43, rand(0,255));
			imagechar($this ->image, 5, $fg, 0, $fa, $textcolor);
			$fg = $fg+rand(10, 25);
		}
		$this->code = $result;
	}
	public function outputImage(){
		header("content-type:image/png\r\n");
		imagepng($this ->image);
		imagedestroy($this ->image);
	}
	
	public function getCode(){
		
		return $this->code;
		
	}
	/**
	 * 生产水印
	 */
	public function createWatermark(){
	    header('Content-Type: image/png');
	    
	    // Create the image
	    $im = imagecreatetruecolor(200, 80);
	    // Create some colors
	    $white = imagecolorallocate($im, 255, 255, 255);
	    $grey = imagecolorallocate($im, 128, 128, 128);
	    imagefilledrectangle($im, 0, 0, 399, 200, $white);
	    // The text to draw
	    $text = '陈官勇2018';
	    // Replace path by your own font path
	    $font = 'FZSTK.TTF';
	    // Add some shadow to the text
	    imagettftext($im, 20, 22, 25, 75, $grey, $font, $text);
	    // Using imagepng() results in clearer text compared with imagejpeg()
	    imagepng($im);
	    imagedestroy($im);
	}
}
