<?php
include_once 'lib/network/socket_tcp.php';
include_once 'session/massage.php';
class ExecuteHtmlTrObject{

    private $file;//文件操作对象
    private $extrahtml;//代码分离
    private $analytic;//代码处理
    public $TargetPath;//目标路径
    public $TemplatePath;//模板路径    
    public $type;//类型
    public function __construct($tarpath, $tempath, $type = 0){

        $this->TargetPath = $tarpath;
        $this->TemplatePath = $tempath;
        $this->file = new file_option($this->TemplatePath);
        $this->type = $type;
        //$this->extrahtml = new ExtractHtml($html)
    }
    public function setType($type){
        
        $this->type = $type; 
        
    }
    public function init(){
        $html = $this->file->read();
        if($html == false){

            return false;
        }
        $this->extrahtml = new ExtractHtml($html);//初始化了分离HTML
        $object = $this->extrahtml->extract_prase_run();
        if($object == false){

            return false;
        }

        $this->analytic = new AnalyticObject($object, $html);
        $this->analytic->setMode($this->type);
        $this->file->close();
    }
    public function run(){
        if($this->type == "0"){

            $html = dowen();
        }else{

            $html = $this->analytic->run();

        }

        $file = new file_option($this->TargetPath);
        $file->write($html);
        $file->close();
    }
    //处理文章
    private function dowen(){

        $ass = getremm();
        foreach ($ass as $value){
            $this->analytic->run($value);

        }
    }
    //获取远程文件
    public function getremm($quest_array){
        
        $xml=new massage_xml();
        $shenqing=$xml->prase_xml1(array("name"=>1,"error"=>2,"handle_type"=>3),"handle");
        $shenqing=$shenqing.$xml->prase_xml1(array("name"=>"buildwen","data"=>$quest_array['size'],"type"=>$quest_array['type']),"body");
        $shenqing=$xml->getft()."<root>".$shenqing."</root>";
        $socket=new  socket_tcp("192.168.0.105", 3000);
        $socket->socket_tcp_send($shenqing);
        //	echo "ewe";
        $r=	$socket->socket_tcp_rec1(2000);
        $socket->socket_tcp_close();
        $e=strpos($r,"#");
        $r= substr($r, 0,$e);
        
        $xml= new massage_xml();
        $xml->initxml($r);
        // echo "3";
        $arry=$xml->z_prese_array();
        
        if($arry['data']=='False'){
            // echo "123456";
            //exit;
        }      
        
    }
}