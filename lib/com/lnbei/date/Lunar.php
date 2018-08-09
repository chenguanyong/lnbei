<?PHP
namespace com\lnbei\date;
class Lunar
{
    private  $_SMDay = array(1 => 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);//定义公历月分天数
    private  $_LStart = 1950 ;//农历从1950年开始
    private  $_LMDay = array(
    //差：该年的农历正月初一到该年公历1月1日的天数；1~12：农历月份天数；闰：如有闰月，记录该月平月天数
    //    差  1  2  3  4  5  6  7  8  9 10 11 12 闰
    array(47,29,30,30,29,30,30,29,29,30,29,30,29),
    array(36,30,29,30,30,29,30,29,30,29,30,29,30),
    array(6,29,30,29,30,59,29,30,30,29,30,29,30,29),    //五月29 闰五月30
    array(44,29,30,29,29,30,30,29,30,30,29,30,29),
    array(33,30,29,30,29,29,30,29,30,30,29,30,30),
    array(23,29,30,59,29,29,30,29,30,29,30,30,30,29),    //三月29 闰三月30
    array(42,29,30,29,30,29,29,30,29,30,29,30,30),
    array(30,30,29,30,29,30,29,29,59,30,29,30,29,30),    //八月30 闰八月29
    array(48,30,30,30,29,30,29,29,30,29,30,29,30),
    array(38,29,30,30,29,30,29,30,29,30,29,30,29),
    array(27,30,29,30,29,30,59,30,29,30,29,30,29,30),    //六月30 闰六月29
    array(45,30,29,30,29,30,29,30,30,29,30,29,30),
    array(35,29,30,29,29,30,29,30,30,29,30,30,29),
    array(24,30,29,30,58,30,29,30,29,30,30,30,29,29),    //四月29 闰四月29
    array(43,30,29,30,29,29,30,29,30,29,30,30,30),
    array(32,29,30,29,30,29,29,30,29,29,30,30,29),
    array(20,30,30,59,30,29,29,30,29,29,30,30,29,30),    //三月30 闰三月29
    array(39,30,30,29,30,30,29,29,30,29,30,29,30),
    array(29,29,30,29,30,30,29,59,30,29,30,29,30,30),    //七月30 闰七月29
    array(47,29,30,29,30,29,30,30,29,30,29,30,29),
    array(36,30,29,29,30,29,30,30,29,30,30,29,30),
    array(26,29,30,29,29,59,30,29,30,30,30,29,30,30),    //五月30 闰五月29
    array(45,29,30,29,29,30,29,30,29,30,30,29,30),
    array(33,30,29,30,29,29,30,29,29,30,30,29,30),
    array(22,30,30,29,59,29,30,29,29,30,30,29,30,30),    //四月30 闰四月29
    array(41,30,30,29,30,29,29,30,29,29,30,29,30),
    array(30,30,30,29,30,29,30,29,59,29,30,29,30,30),    //八月30 闰八月29
    array(48,30,29,30,30,29,30,29,30,29,30,29,29),
    array(37,30,29,30,30,29,30,30,29,30,29,30,29),
    array(27,30,29,29,30,29,60,29,30,30,29,30,29,30),    //六月30 闰六月30
    array(46,30,29,29,30,29,30,29,30,30,29,30,30),
    array(35,29,30,29,29,30,29,29,30,30,29,30,30),
    array(24,30,29,30,58,30,29,29,30,29,30,30,30,29),    //四月29 闰四月29
    array(43,30,29,30,29,29,30,29,29,30,29,30,30),
    array(32,30,29,30,30,29,29,30,29,29,59,30,30,30),    //十月30 闰十月29
    array(50,29,30,30,29,30,29,30,29,29,30,29,30),
    array(39,29,30,30,29,30,30,29,30,29,30,29,29),
    array(28,30,29,30,29,30,59,30,30,29,30,29,29,30),    //六月30 闰六月29
    array(47,30,29,30,29,30,29,30,30,29,30,30,29),
    array(36,30,29,29,30,29,30,29,30,29,30,30,30),
    array(26,29,30,29,29,59,29,30,29,30,30,30,30,30),    //五月30 闰五月29
    array(45,29,30,29,29,30,29,29,30,29,30,30,30),
    array(34,29,30,30,29,29,30,29,29,30,29,30,30),
    array(22,29,30,59,30,29,30,29,29,30,29,30,29,30),    //三月30 闰三月29
    array(40,30,30,30,29,30,29,30,29,29,30,29,30),
    array(30,29,30,30,29,30,29,30,59,29,30,29,30,30),    //八月30 闰八月29
    array(49,29,30,29,30,30,29,30,29,30,30,29,29),
    array(37,30,29,30,29,30,29,30,30,29,30,30,29),
    array(27,30,29,29,30,58,30,30,29,30,30,29,30,29),    //五月29 闰五月29
    array(46,30,29,29,30,29,29,30,29,30,30,30,29),
    array(35,30,30,29,29,30,29,29,30,29,30,30,29),
    array(23,30,30,29,59,30,29,29,30,29,30,29,30,30),    //四月30 闰四月29
    array(42,30,30,29,30,29,30,29,29,30,29,30,29),
    array(31,30,30,29,30,30,29,30,29,29,30,29,30),
    array(21,29,59,30,30,29,30,29,30,29,30,29,30,30),    //二月30 闰二月29
    array(39,29,30,29,30,29,30,30,29,30,29,30,29),
    array(28,30,29,30,29,30,29,59,30,30,29,30,30,30),    //七月30 闰七月29
    array(48,29,29,30,29,29,30,29,30,30,30,29,30),
    array(37,30,29,29,30,29,29,30,29,30,30,29,30),
    array(25,30,30,29,29,59,29,30,29,30,29,30,30,30),    //五月30 闰五月29
    array(44,30,29,30,29,30,29,29,30,29,30,29,30),
    array(33,30,29,30,30,29,30,29,29,30,29,30,29),
    array(22,30,29,30,59,30,29,30,29,30,29,30,29,30),    //四月30 闰四月29
    array(40,30,29,30,29,30,30,29,30,29,30,29,30),
    array(30,29,30,29,30,29,30,29,30,59,30,29,30,30),    //九月30 闰九月29
    array(49,29,30,29,29,30,29,30,30,30,29,30,29),
    array(38,30,29,30,29,29,30,29,30,30,29,30,30),
    array(27,29,30,29,30,29,59,29,30,29,30,30,30,29),    //六月29 闰六月30
    array(46,29,30,29,30,29,29,30,29,30,29,30,30),
    array(35,30,29,30,29,30,29,29,30,29,29,30,30),
    array(24,29,30,30,59,30,29,29,30,29,30,29,30,30),    //四月30 闰四月29
    array(42,29,30,30,29,30,29,30,29,30,29,30,29),
    array(31,30,29,30,29,30,30,29,30,29,30,29,30),
    array(21,29,59,29,30,30,29,30,30,29,30,29,30,30),    //二月30 闰二月29
    array(40,29,30,29,29,30,29,30,30,29,30,30,29),
    array(28,30,29,30,29,29,59,30,29,30,30,30,29,30),    //六月30 闰六月29
    array(47,30,29,30,29,29,30,29,29,30,30,30,29),
    array(36,30,30,29,30,29,29,30,29,29,30,30,29),
    array(25,30,30,30,29,59,29,30,29,29,30,30,29,30),    //五月30 闰五月29
    array(43,30,30,29,30,29,30,29,30,29,29,30,30),
    array(33,29,30,29,30,30,29,30,29,30,29,30,29),
    array(22,29,30,59,30,29,30,30,29,30,29,30,29,30),    //三月30 闰三月29
    array(41,30,29,29,30,29,30,30,29,30,30,29,30),
    array(30,29,30,29,29,30,29,30,29,30,30,59,30,30),    //十一月30 闰十一月29
    array(49,29,30,29,29,30,29,30,29,30,30,29,30),
    array(38,30,29,30,29,29,30,29,29,30,30,29,30),
    array(27,30,30,29,30,29,59,29,29,30,29,30,30,29),    //六月29 闰六月30
    array(45,30,30,29,30,29,29,30,29,29,30,29,30),
    array(34,30,30,29,30,29,30,29,30,29,29,30,29),
    array(23,30,30,29,30,59,30,29,30,29,30,29,29,30),    //五月30 闰五月29
    array(42,30,29,30,30,29,30,29,30,30,29,30,29),
    array(31,29,30,29,30,29,30,30,29,30,30,29,30),
    array(21,29,59,29,30,29,30,29,30,30,29,30,30,30),    //二月30 闰二月29
    array(40,29,30,29,29,30,29,29,30,30,29,30,30),
    array(29,30,29,30,29,29,30,58,30,29,30,30,30,29),    //七月29 闰七月29
    array(47,30,29,30,29,29,30,29,29,30,29,30,30),
    array(36,30,29,30,29,30,29,30,29,29,30,29,30),
    array(25,30,29,30,30,59,29,30,29,29,30,29,30,29),    //五月29 闰五月30
    array(44,29,30,30,29,30,30,29,30,29,29,30,29),
    array(32,30,29,30,29,30,30,29,30,30,29,30,29),
    array(22,29,30,59,29,30,29,30,30,29,30,30,29,29),    //三月29 闰三月30       
    );
    //是否闰年
    private function IsLeapYear($AYear){
        return ($AYear % 4 == 0) && (($AYear % 100 != 0) || ($AYear % 400 == 0));
    }
    //公历该月的天数(year：年份； month：月份)
    private function GetSMon($year,$month)
    {
        if($this->IsLeapYear($year) && $month == 2)
            return 29;
        else
            return $this->_SMDay[$month];
    }
    //农历名称转换
    private function LYearName($year)
    {
        $Name = array("零","一","二","三","四","五","六","七","八","九");
        for($i=0;$i<4;$i++)
            for($k=0;$k<10;$k++)
                if($year[$i]==$k)
                    $tmp.=$Name[$k];
        return $tmp;
    }
     
    private function LMonName($month)
    {
        if($month >=1 && $month <=12 )
        {
            $Name = array( 1=>"正","二","三","四","五","六","七","八","九","十","十一","十二");
            return $Name[$month];
        }
        return $month;
    }
     
    private function LDayName($day)
    {
        if($day >=1 && $day <=30 )
        {
            $Name = array( 1 =>
            "初一","初二","初三","初四","初五","初六","初七","初八","初九","初十",
            "十一","十二","十三","十四","十五","十六","十七","十八","十九","二十",
            "廿一","廿二","廿三","廿四","廿五","廿六","廿七","廿八","廿九","三十"
            );
            return $Name[$day];
        } 
        return $day;
    }
     
    //公历转农历(Sdate：公历日期)
    public function S2L($date)
    {
        list($year, $month, $day) = explode("-", $date);
        if($year <= 1951 || $month <= 0 || $day <= 0 || $year >= 2051 ) return false;
        //获取查询日期到当年1月1日的天数
        $date1 = strtotime($year."-01-01");//当年1月1日
        $date2 = strtotime($year."-".$month."-".$day);
        $days=round(($date2-$date1)/3600/24);
        $days += 1;
        //获取相应年度农历数据，化成数组Larray
        $Larray = $this->_LMDay[$year - $this->_LStart];
        if($days <= $Larray[0])
        {
            $Lyear = $year - 1;
            $days = $Larray[0] - $days;
            $Larray = $this->_LMDay[$Lyear - $this->_LStart];
            if($days < $Larray[12])
            {
                $Lmonth = 12;
                $Lday = $Larray[12] - $days;
            }
            else
            {
                $Lmonth = 11;
                $days = $days - $Larray[12];
                $Lday = $Larray[11] - $days;
            }           
        }
        else
        {
            $Lyear = $year;
            $days = $days - $Larray[0];
            for($i = 1;$i <= 12;$i++)
            {
                if($days > $Larray[$i]) $days = $days - $Larray[$i];
                else
                {
                    if ($days > 30){
                        $days = $days - $Larray[13];
                        $Ltype = 1;
                    }
                 
                    $Lmonth = $i;
                    $Lday = $days;
                    break;
                }
            }
        }
        return mktime(0, 0, 0, $Lmonth, $Lday, $Lyear);
        //$Ldate = $Lyear."-".$Lmonth."-".$Lday;
        //$Ldate = $this->LYearName($Lyear)."年".$this->LMonName($Lmonth)."月".$this->LDayName($Lday);
        //if($Ltype) $Ldate.="(闰)";
        //return $Ldate;
    }
    //农历转公历(date：农历日期； type：是否闰月)
    public function L2S($date,$type = 0)
    {
        list($year, $month, $day) = explode("-",$date);
        if($year <= 1951 || $month <= 0 || $day <= 0 || $year >= 2051 ) return false;
        $Larray = $this->_LMDay[$year - $this->_LStart];
        if($type == 1 && count($Larray)<=12 ) return false;//要求查询闰，但查无闰月
        //如果查询的农历是闰月并该年度农历数组存在闰月数据就获取
        if(@$Larray[$month]>30 && $type == 1 && count($Larray) >=13)   $day = $Larray[13] + $day;
        //获取该年农历日期到公历1月1日的天数
        $days = $day;
        for($i=0;$i<=$month-1;$i++)
            $days += $Larray[$i];
        //当查询农历日期距离公历1月1日超过一年时
        if($days > 366 || ($this->GetSMon($month,2)!=29 && $days>365 ))
        {
            $Syear = $year +1;
            if($this->GetSMon($month,2)!=29) 
                $days-=366;
            else
                $days-=365;
            if($days > $this->_SMDay[1]) 
            {
                $Smonth = 2;
                $Sday = $days - $this->_SMDay[1];
            }
            else
            {
                $Smonth = 1;
                $Sday = $days;
            }       
        }
        else
        {
            $Syear =$year;
            for($i=1;$i<=12;$i++)
            {
                if($days > $this->GetSMon($Syear,$i))
                    $days-=$this->GetSMon($Syear,$i);
                else
                {
                    $Smonth = $i;
                    $Sday = $days;
                    break;
                }
            }
        }
        return mktime(0, 0, 0, $Smonth, $Sday, $Syear);
        //$Sdate = $Syear."-".$Smonth."-".$Sday;
        //return $Sdate;
    }
    //
}
?>