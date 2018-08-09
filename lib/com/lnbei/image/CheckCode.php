<?php
namespace com\lnbei\image;
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
}
