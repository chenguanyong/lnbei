<?php 
namespace com\lnbei;
class CheckInput {

    //妫�煡鐢ㄦ埛鍚嶈緭鍏�
    function check_name($user_name){
    	$fd=strip_tags(trim($user_name));
    	$paten="/^[A-Z,a-z,_][0-9,A-Z,a-z,_]{6,10}$/i";
        $result=preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE);
    	if($result>0){
    		return true;
    		}else return false;
    }
    function check_ya($username){
    	$fd=strip_tags(trim($username));
    	$paten="/^[0-9,a-z,A-Z]{4}$/i";
    	$result=preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE);
    	if($result>0){
    		return true;
    	}else return false;
    }
    //检查数字
    function check_num($num){
    	$fd=strip_tags(trim($num));
    	$paten="/^[0-9,.]{0,4}$/i";
    	$result=preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE);
    	if($result>0){
    		return true;
    	}else return false;
    }
    //检查数字
    function check_num2($num,$e,$r){
    	$fd=strip_tags(trim($num));
    	$paten="/^[0-9,.]{".$e.",".$r."}$/i";
    	$result=preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE);
    	if($result>0){
    		return true;
    	}else return false;
    }
    //检查批次；
    function check_pici($pici){
    	
    	$fd=strip_tags(trim($pici));
    	$paten="/^[0-9,.]{0,4}$/i";
    	$result=preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE);
    	if($result>0){
    		return true;
    	}else return false;
    }
    function check_phone($phone1){
        $fd=strip_tags($phone1);
        $paten="/^[1][3-5,7,8][0-9]{9}$/i";
        $result=preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE);
        $result."-------------";
    	if($result>0){
    		return true;
    	}else return false;
    }
    function check_power($power){
        $fd=strip_tags($power);
        $paten="/^[A-Z,a-z,0-9,_,.,?,@,#,\$]{6,10}$/i";
        $result=@preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE);
        if($result>0){
        	return true;
        }else{ 
          return false;
        }
    }
    function check_mail($mail){
        $fd=strip_tags(trim($mail));
        $paten="/^[_,a-z,A-Z,0-9]*@[A-Z,a-z,0-9]*\.[A-Z,a-z]{2,3}\.{0,1}[C,N,c,n]{0,2}$/i";
        $result=preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE);
        if($result>0){
        return true;
        }else{
        return false;}
    }
     
    function check_text($text_input){
    				
        $fd=strip_tags(trim($text_input));
        $paten="/\bselect\b/i";
        if(preg_match($paten,$fd,$ff,PREG_OFFSET_CAPTURE)>0) return false;
        elseif ($result=preg_match("/\bupdate\b/i",$fd,$ff,PREG_OFFSET_CAPTURE)>0) return false;
        elseif ($result=preg_match("/\bcreate\b/i",$fd,$ff,PREG_OFFSET_CAPTURE)>0) return false;
        elseif ($result=preg_match("/\bdelete\b/i",$fd,$ff,PREG_OFFSET_CAPTURE)>0) return false;
        else return true;			
    }
    function check_html($text){
    
        $fd=trim($text);
        $fd=htmlspecialchars_decode($fd);
        $par="/\b&lt\b.\b&lt\b.\b&lt\b\/.\b&lt\b/i";
        $result=preg_match($par,$fd,$ff,PREG_OFFSET_CAPTURE);
        if($result==0)return true;
        else return false;
    }
}
?>