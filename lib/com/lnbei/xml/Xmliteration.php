<?php
namespace com\lnbei\xml;
use com\lnbei\math\MathTool;
use com\lnbei\html\core\tool\Tool;

class Xmliteration
{   
    private $xml;
    private $pid;
    public function __construct($xml){
        $this->pid = MathTool::random();
        //$xml = Tool::inspectXml($xml);//
       // echo "<textarea>".$xml."</textarea>";
       // exit;
        //try{
        $this->xml = new \SimpleXMLElement($xml);
        
        //exit;
        
//         }catch(\Exception $e){
//             exit($e->getMessage());
//         }
    }
    private function xmliteration($xmls,$i=0,$x=0,$callbackobj){
        $id = $i;
        $xx = $x+1;
        foreach ($xmls as $v){
            $ids = $id;//临时变量
            $cid = MathTool::random();
            
            $IDArray = ['pid'=>$id,'id'=>$cid,"xid"=>$xx,"xpid"=>$x];
            $xx = $xx+1;
            $callbackobj->call($v,$IDArray);
            self::xmliteration($v,$cid,$xx,$callbackobj);
        }
    }
    public function literation($callbackobj,$x=0,$pid=0){
        //var_dump($this->xml->getName());
        //exit();
        $fristTag = self::getFistTag($x,$pid);
        $callbackobj->setFristTag($fristTag);
        self::xmliteration($this->xml,$this->pid,$x ,$callbackobj);
    }
    //检测是否有后代
    public static function haveChildren($xml){
        if(is_object($xml)&&$xml != null){
           return count($xml->children()) != 0?true:false;
        }else{
            throw new \Exception();
            return false;
        }
    }
    /**
     * 获取根标签属性
     * @return array[]|string[]
     */
    public function getFistTag($id = 0,$pid = 0){
        $tag = $this->xml->getName();
        $attr = array();
        foreach ($this->xml->attributes() as $key=>$value){
            $attr[$key]=(String)$value;
        }
        $attr['xid'] = $id;
        $attr['xpid'] = $pid;
        return array('tag'=>$tag,'attr'=>$attr);
    }
   
}

?>