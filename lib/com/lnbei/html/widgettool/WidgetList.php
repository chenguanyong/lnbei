<?php
namespace com\lnbei\html\widgettool;

use com\lnbei\html\widgettool\widgetlist\WidgetListCallback;
use com\lnbei\html\core\config\Config;
use com\lnbei\file\DirErgodic;
use com\lnbei\file\File;
use com\lnbei\xml\Xmliteration;
use com\lnbei\html\core\data\ContentIterator;
use com\lnbei\html\core\log\SimpleLog;
class WidgetList
{
    /**
     * 套件列表
     * @var array
     */
    private $widgetList;
    /**
     * 
     */
    public function __construct(){
        $this->widgetList = array("childen"=>array());
        $this->widgetList['xid']=0;
        self::init();
    }
    public function init(){
        $filepath = DirErgodic::getDirArray(Config::getConfig("TEMPLATEPATH"));
       // $templeDirArray = DirErgodic::ergodics(Config::getConfig("TEMPLATEPATH"),"config.xml");
        $i=1;
        $pid = 0;
        foreach ($filepath as $key=>$value){
            $templeDirArray = DirErgodic::ergodics($value,"config.xml");
            $temp = array();
            try {
                $xmlstr = File::fReadContex($templeDirArray[1]);
            }catch (\Exception $e){
                echo $e->getMessage();
            }
            $mWidgetList = new WidgetListCallback();
            $xmllteration = new Xmliteration($xmlstr);
            $xmllteration->literation($mWidgetList,$i,$pid);
            $temp = $mWidgetList->getWidgetNameXmlAttr();
           
            $rootName = $mWidgetList->firstAttr['name'];
            if(empty($rootName)){
                throw new \Exception("xml模板配置文件缺少name属性");
            }
            $i += 1001;
            $onekey = '';
            $onekey=array_keys($temp)[0];//isparent
            $this->widgetList['childen'][$rootName]=$mWidgetList->firstAttr;
            $this->widgetList['childen'][$rootName]['isparent'] = true;
            $mContentIterator = new ContentIterator($temp);
            $mContentIterator->runIteration($mWidgetList,$onekey);
            $this->widgetList['childen'][$rootName]['childen'] = $mWidgetList->getWidgetNameAttr();
            
        }
    }
    /**
     * 获取widget数据列表
     */
    public function getWidgetList(){
        return $this->widgetList;
    }
    /**
     * 根据父ID获取子菜单
     */
    public function getWidgetListByPid($pid){
        $result = array();
        foreach ($this->widgetList as $key=>$value){
            if($this->widgetList['xid'] == $pid){
                return $this->widgetList['childen'];
            }
            $result = self::iterator($this->widgetList['childen'], $pid);
            if($result != false){
    
                return $result;
            }
        }
        return null;
    }
    private function iterator($data,$pid){
        foreach ($data as $key=>$value){
            if(!empty($value)){
                if($value['xid'] == $pid){
                    if(!empty($value['childen'])){
                        return  $value['childen'];
                    }
                }else{
                    if(!empty($value['childen'])){
                        $result = self::iterator($value['childen'], $pid);
                        if($result != false){
                            return $result;
                        }
                    }
                }
            }
        }
        return false;
    }
}

?>