<?php 
//计算时间差
function subTime($end,$now){
    $r = new DateTime($end);
    $months = (int)$r->format('m');
    $days = (int)$r->format('d');
    $rs = new DateTime($now);
    $month = (int)$rs->format('m');
    $day = (int)$rs->format('d');
    if((int)$r->format('Y')<(int)$rs->format('Y')){
        return false;
    }elseif((int)$r->format('Y')>(int)$rs->format('Y')){
        return true;
    }
    if($months - $month> 0 ){
        return true;
    }else if($months - $month == 0 ){
        if($days -$day >=0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
//提醒函数
function remind($type,$day){

    switch ($type){
        case "天":{return true;}break;
        case "周":{
            $int = date('N');
            if(7 > $day){
                if((7-$day)<$int){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }break;
        case "旬":{
            $int = date("j");
            $all = date("t");
            if(20 > $int && $int >= 10){
                if(10 - $day > 0){
                     
                    if((20-$day)>$int){
                        return false;
                    } else{
                        return true;
                    }
                }else{
                    return false;
                }
            }elseif($int <= 10){
                if(10 - $day > 0){

                    if((10-$day)>$int){
                        return false;
                    } else{
                        return true;
                    }
                } else{
                    return false;
                }
            }else{
                if(10 - $day > 0){

                    if(($all-$day)>$int){
                        return false;
                    } else{
                        return true;
                    }
                } else{
                    return false;
                }
            }
             
        }break;
        case "双周":{
            $int = date('W');
            if ($int%2 == 0){
                if(7>$day){
                    $w = date('N');
                    if((7-$day)<$w){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
                 
            }else{
                return false;
            }
             
        }break;
        case "月":{
            $moth = date('t');
            if($moth - $day >0){
                $j = date('j');
                if(($moth - $day) < $j ){
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }
             
        }break;
        case "季":{
            $n = date('n');//当前的月份
            $z = date('z');//当前的天数
            if(1 <= $n && $n <4){
                if((90 - $day) < $z && $z <= 90 ){
                    return true;
                }else{
                    return false;
                }
            }elseif(4 <= $n && $n < 7){
                if((181 - $day) < $z && $z <= 181){
                    return true;
                }else{
                    return false;
                }
            }elseif(7 <= $n && $n < 9){
                if((273 - $day) < $z && $z <= 273 ){
                    return true;
                }else{
                    return false;
                }
            }else{
                if((365 - $day) < $z && $z <= 365){
                    return true;
                }else{
                    return false;
                }
            }
        }break;
        case "半年":{
            $n = date('n');//当前的月份
            $z = date('z');//当前的天数
            if(1<= $n && $n <= 6){
                if((181 - $day) < $z && $z <= 181){
                    return true;
                }else{
                    return false;
                }
            }else{
                if((365 - $day) < $z && $z <= 365){
                    return true;
                }else{
                    return false;
                }
            }
        }break;
        case "年":{
            $n = date('n');//当前的月份
            $z = date('z');//当前的天数
            if($n == 12){
                if((365 - $day) < $z){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }break;
        case "春节":{
            $z = date('z');//当前的天数
            $Y = date("Y");
            $lunar = new Lunar();
            $gl = date("Y-m-d",$lunar->L2S(date("Y")."-1-1",0));
            $r = new DateTime($gl);
            $months = (int)$r->format('m');
            $all = 0;
            for($i = 1 ; $i <= $months ; $i++){

                $all += date("t",mktime(0,0,0,$i,1,$Y));
            }
            $all = $all + (int)$r->format('d');
            if(($all - $day) < $z && $z <$all){
                return true;
            }else{
                return false;
            }
        }break;
        case "清明":{
            $z = date('z');//当前的天数
            $Y = date("Y");
            for($i = 1 ; $i <= 4 ; $i++){
                 
                $all += date("t",mktime(0,0,0,$i,1,$Y));
            }
            $all = $all + 5;
            if(($all - $day) < $z && $z <$all){
                return true;
            }else{
                return false;
            }
             
        }break;
        case "五一":{
            $z = date('z');//当前的天数

            if((121 - $day) < $z  && $z <= 121){
                return true;
            }else{
                return false;
            }
        }break;
        case "国庆":{
            $z = date('z');//当前的天数
            if((273 - $day) < $z && $z <= 273){
                return true;
            }else{
                return false;
            }
        }break;
        case "中秋":{
            $z = date('z');//当前的天数
            $Y = date("Y");
            $lunar = new Lunar();
            $gl = date("Y-m-d",$lunar->L2S(date("Y")."-8-15",0));
            $r = new DateTime($gl);
            $months = (int)$r->format('m');
            $all = 0;
            for($i = 1 ; $i <= $months ; $i++){
                 
                $all += date("t",mktime(0,0,0,$i,1,$Y));
            }
            $all = $all + (int)$r->format('d');
            if(($all - $day) < $z && $z <$all){
                return true;
            }else{
                return false;
            }
        }break;
    }
}
      
?>
   