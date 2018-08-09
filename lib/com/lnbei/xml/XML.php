<?php
/*
$str1=<<<XML
<?xml version="1.0"  standalone='yes'?>


<root1>
  

<error>1</error>
<handle_type>2</handle_type>
<error>1</error>
<handle_type>2</handle_type>




</root1>
XML;

$xml=new SimpleXMLElement($str1);
//$xml=$xml->children();
//echo $xml->getName();
//echo $xml->count();
$stry="{";
echo $d=$xml->count();
if($xml->count()==0){
	
	

foreach($xml->children() as $fd){
echo $fd->getName();	
	$stry=$stry."\"".$fd->getName()."\"".":{";
	foreach ($fd->children()as $fw){
		$stry=$stry."\"".$fw->getName()."\":".$fw.",";
		
		
	}
	$stry=substr($stry,0,strlen($stry)-1);
	$stry.="},";
	
	
	
}
$stry=substr($stry,0,strlen($stry)-1);
$stry.="}";
}
else {
	$stry=$stry."\"".$xml->getName()."\"".":{";
	foreach ($xml->children()as $fw){
		$stry=$stry."\"".$fw->getName()."\":".$fw.",";
	
	
	}
	$stry=substr($stry,0,strlen($stry)-1);
	$stry.="},";
	
	
	
	
	$stry=substr($stry,0,strlen($stry)-1);
	$stry.="}";
	
	
	
	
	
}
echo $stry;







$str=<<<XML
<?xml version='1.0'?>
<root>
<handle>
<name>3</name>
<error>3555555555555</error>
<handle_type>4</handle_type>
		</handle>
		<bordy>
		
		<name>5</name>
		<data>r</data>
		<type>r</type>
		
		</bordy>
</root>
XML;
*/
namespace com\lnbei\session;
class  XML{
	protected   $xml;
	protected  $str;
	protected  $ft;
	public $error;
	public $handle_type;
	public $name;
	public $data;
	public $type;
	public function __construct(){

		$this->data="";
		$this->error="";
		$this->handle_type="";
		$this->name="";
		$this->type="";
		$this->ft="<?xml version='1.0' encoding='utf-8'?>";

	}//ok
	public function initxml($str1){
		$this->str=$str1;
		$this->xml=new SimpleXMLElement($str1);
	}
	public function initxmlfile($path){
	
    	if (file_exists($path)) {
            $this->xml = simplexml_load_file($path);
        } else {
            exit();
        }
	
	}
	public function getft(){
		
		return $this->ft;
		
	}
	public function init(){
		
		foreach ($this->xml->children() as $fg){
			foreach ($fg->children() as $fw) {
				$str1=$fw->getName();
				switch($str1){

					case"error":$this->error=$fw;break;

					case "handle_type":$this->handle_type=$fw;break;
					case "name": $this->name=$fw;break;
					case "data":$this->data=$fw;break;
					case "type":$this->type=$fw;break;
					case "f":$this->type=$fw;break;
				}
			}
		}

	}
/*
$sd=<<<xml <?xml version='1.0'?>
<root>
<handle>
<name>3</name>
<error>3555555555555</error>
<handle_type>4</handle_type></handle>
		<bordy>
		<name>5</name>
		<data>r</data>
		<type>r</type>
		</bordy>
</root>
 * <<<xml;
 * �������xml�ļ�ת��������
 * 
 */
	public function prese_array(){
		$hr=$this->xml->children();
		$gt=array();
		foreach($hr as $ko){
			$gt[$ko->getName()]=$ko;
		}
		return $gt;
	}
	public function z_prese_array(){
		$hr=$this->xml->children();
		$gt=array();
		foreach($hr[1] as $ko){
			$gt[$ko->getName()]=$ko;
		}
		return $gt;
	}
	/*
	 * ������ת���ɼ򵥵�xml
	 * 
	 * ok
	 * $t:array
	 * $rt:string
	 */
	public function prase_xml1($t,$rt){
		$x=new XMLWriter();
		$x->openMemory();
		//$x->startElement("root1");
		$x->startElement($rt);
		foreach($t as $name=>$value){
		$x->writeElement($name, $value);
		}
		$x->endElement();
		$f= $x->outputMemory();
		return $f;
	}
		
	public function getxml(){
		return $this->xml;
	}
	
	
	//��ά����ת��xml
	/*<?xml version='1.0' standalone='yes'?><root><s><name>sd</name>
	 * <jnksdj>sdcs</jnksdj>
	 * </s><f><name>sd</name><jnksdj>sdcs</jnksdj></f></root>
	 * $array_data:��ά����
	 * 
	 */
public  function array_prase_xml($array_data){
		//$str="<bordy>";
		$x=new XMLWriter();
		$x->openMemory();
		$x->startElement("root");
		$x->startElement("handle");
		$x->writeElement("error", "o");
		$x->writeElement("type", "do");
		$x->endElement();
		$x->startElement("body");
		foreach($array_data as $key=>$r){
				$x->writeElement($key, $r);
		}
		$x->endElement();
		$x->endElement();
		$f1= $x->outputMemory();
		return $this->ft.$f1;
	}
	
	public  function array_prase_xml2($array_data,$cc){
		//$str="<bordy>";
		$x=new XMLWriter();
		$x->openMemory();
		$x->startElement($cc);
		foreach($array_data as $key=>$r){
			$x->startElement($key);
			foreach($r as$f=> $fd){
				$x->writeElement($f, $fd);
			}
			$x->endElement();
		}
		$x->endElement();
		 $f1= $x->outputMemory();
		 return $this->ft.$f1;
	}
	//ok
	/*
	 * (
    [user] => Array
        (
            [name] => 5
            [data] => r
            [type] => r
        )

    [user2] => Array
        (
            [name] => 5
            [data] => r
            [type] => r
        )

)
	 *<?xml version='1.0'?>
<root>
<handle>
<name>3</name>
<error>3555555555555</error>
<handle_type>4</handle_type>
		</handle>
		<bordy>
		<user>
		<name>5</name>
		<data>r</data>
		<type>r</type>
		</user>
		<user2>
		<name>5</name>
		<data>r</data>
		<type>r</type>
		</user2>
		</bordy>
</root> 
	 * 
	 * 
	 */
	public function xml_prase_array(){
		$str=array();
	
			$fg=$this->xml->children(); 
		//echo 	$fg->count()."dds";
			//$i=0;
			foreach ($fg[1]->children() as $re=>$fw) {
				$ds=array();
				foreach ($fw->children() as $fw1) {
				  $str1=$fw1->getName();
				//echo $fw1;
				$r=(string)$fw1;
				//$ds=array();
				$ds[$str1]=$r;
				///$this->xml->saveXML();
				//print_r($fw1);
				}
				
				$str[$re]=$ds;
		//$i++;
			}
		
			$this->xml->saveXML();
		
		return $str;
	}
	
	//
	public function t_xml_prase_array(){
		
		$str=array();
		
		$fg=$this->xml->children();
		$i=0;
		foreach ($fg[0]->children() as $f) {
			//$ds=array();
			//foreach($f as $r1)
				$str1=$f->getName();
		
				//$ds=array();
				$str[$str1]=(string)$f;
				//$this->xml->saveXML();
		
			}
			//$str[$f->getName()]=$ds;
			//$i++;
		
		
		$this->xml->saveXML();
		
		return $str;
		
		
		
	}

}






//$xml1=new massage_xml(); 
//echo $xml1->array_prase_xml(array("namw"=>"dsjksd","mjii"=>"ashja"));
//$xml1->initxml($str);
//$xml1->init();
/*echo $xml1->error;
echo $xml1->handle_type;
echo $xml1->data;
//print_r($xml1->prese_array()) ;
//exit("ddd");
//echo $xml1->prase_xml1(array("name"=>"sd","jnksdj"=>"sdcs"), "boif");
//echo $xml1->array_prase_xml2(array("s"=>array("name"=>"sd","jnksdj"=>"sdcs"),"f"=>array("name"=>"sd","jnksdj"=>"sdcs")), "root");
print_r($xml1->t_xml_prase_array());
print_r(array("s"=>array("name"=>"sd","jnksdj"=>"sdcs"),"f"=>array("name"=>"sd","jnksdj"=>"sdcs")));
 //$xml1->xml_prase_array();

*/

class  massage_xml1 extends massage_xml
{
	private  $jsonstr;
	private $objectstr="{";
	private $objectstr1="}";
	private $arraystr="[";
	private $arraystr1="]";
	public  function __construct(){
		parent::__construct();
//$this->initxml($str);

	}
	public function prase_json(){
		$stry="{";

		foreach($this->xml->children() as $fd){
			//echo $fd->getName();
			$stry=$stry."\"".$fd->getName()."\"".":{";
			foreach ($fd->children()as $fw){
				$stry=$stry."\"".$fw->getName()."\":".$fw.",";
			}
			$stry=substr($stry,0,strlen($stry)-1);
			$stry.="},";
		}
		$stry=substr($stry,0,strlen($stry)-1);
		$stry.="}";
		return $stry;
	}//
	//
	public function xml_prase_json(){
		$stry="{";
	$rt=$this->xml->children();
		foreach($rt[1] as $fd){
			//echo $fd->getName();
			$stry=$stry."\"".$fd->getName()."\"".":{";
			foreach ($fd->children()as $fw){
				$stry=$stry."\"".$fw->getName()."\":".$fw.",";
			}
			$stry=substr($stry,0,strlen($stry)-1);
			$stry.="},";
		}
		$stry=substr($stry,0,strlen($stry)-1);
		$stry.="}";
		
		return $stry;
		
	}
	
	///
	/*
	 * 
	 * 
	 * <?xml version='1.0'?>
<root>
<handle>
<name>3</name>
<error>3555555555555</error>
<handle_type>4</handle_type></handle>
		<bordy>
		<name>5</name>
		<data>r</data>
		<type>r</type>
		</bordy>
</root>
	 *///toubu
	public function prase_json1(){
			$stry="{";
		
			$stry=$stry."\"".$this->xml->getName()."\"".":{";
			$bg=$this->xml->children();
		
			
			foreach ($bg[1]->children() as $ff){
			$stry=$stry."\"".$ff->getName()."\":\"".$ff."\",";	}
			
			
		
		
		$stry=substr($stry,0,strlen($stry)-1);
		
		$stry.="},";
		
		$stry=substr($stry,0,strlen($stry)-1);
		$stry.="}";
			
			
		return $stry;
			
			
	}
public function prase_json2(){
			$stry="{";
		
			$stry=$stry."\"".'brody'."\"".":{";
			$bg=$this->xml->children();
		
			
			foreach ($bg[0]->children() as $ff){
			$stry=$stry."\"".$ff->getName()."\":".$ff.",";	}
			
			
		
		
		$stry=substr($stry,0,strlen($stry)-1);
		
		$stry.="},";
		
		$stry=substr($stry,0,strlen($stry)-1);
		$stry.="}";
			
			
		return $stry;
			
			
	}

}

/*$rer=new massage_xml1();
$rer->initxml($str);
//echo $rer->xml_prase_json();
//echo $rer->prase_json1();
echo $rer->prase_json();*/

class write_json{
	private $obj0;
	private $obj1;
	private $obj2;
	private $obj3;
	private $result;
	public $name;
	
	// public $value;
	public function __construct(){
		$this->obj0="{";
		$this->obj1="}";
		$this->obj2="[";
		$this->obj3="]";
		$this->name= array();
		//$this->value=array();
		$this->result="";
	}
	public function prase_json(){
		$this->result="{";
		foreach ($this->name as $key=>$value){
			$this->result=$this->result."\"".$key."\":".$this->obj0;
			foreach ($value as $ke=>$valu){
					//$t0=strlen($ke);
			 	$this->result=$this->result."\"".$ke."\":\"".$valu."\",";
		
			}
			$this->result=substr($this->result,0,strlen($this->result)-1);
			$this->result.=$this->obj1.",";
		}

		 $this->result=substr($this->result,0,strlen($this->result)-1);
		$this->result=$this->result.$this->obj1;

	}
public function prase_json1(){
		$this->result="{";
		foreach ($this->name as $key=>$value){
			
			$this->result=$this->result."\"".$key."\":".$this->obj0;
			foreach ($value as $ke=>$valu){
					$t0=strlen($ke);
			 	$this->result=$this->result."\"".substr($ke,0, $t0-2)."\":\"".$valu."\",";
					
					
					
					
			}
			$this->result=substr($this->result,0,strlen($this->result)-1);
			$this->result.=$this->obj1.",";
		}

		 $this->result=substr($this->result,0,strlen($this->result)-1);
		$this->result=$this->result.$this->obj1;




	}
public function prase_json4($json){
		$this->result="{";
		foreach ($this->name as $key=>$value){
			
			$this->result=$this->result."\"".$key."\":".$this->obj0;
			foreach ($value as $ke=>$valu){
					$t0=strlen($ke);
			 	$this->result=$this->result."\"".substr($ke,0, $t0)."\":\"".$valu."\",";
					
					
					
					
			}
			$this->result=substr($this->result,0,strlen($this->result)-1);
			$this->result.=$this->obj1.",";
		}

		 $this->result=substr($this->result,0,strlen($this->result)-1);
		$this->result=$this->result.",".$json.$this->obj1;




	}
	
	
public function prase_json3($e){
		$result="";
		
			
			$result=$result."\"classify\":".$this->obj0;
			foreach ($e as $ke=>$valu){
					
			 	$result=$result."\"".$ke."\":".$valu.",";
					
					
					
					
			}
			$result=substr($result,0,strlen($result)-1);
			$result.=$this->obj1.",";
		

		 $result=substr($result,0,strlen($result)-1);
	return 	$result=$result;




	}	
	
	
	

public function prase_json2($data){
		$this->result="{";
		foreach ($this->name as $key=>$value){
			$this->result=$this->result."\"".$key."\":".$this->obj0;
			foreach ($value as $ke=>$valu){
					//$t0=strlen($ke);
			 	$this->result=$this->result."\"".$ke."\":\"".$valu."\",";
					
					
					
					
			}
		if($key=="bordy"){
			$this->result=$this->result.$data;
			$this->result.=$this->obj1.",";}
			else {
			$this->result=substr($this->result,0,strlen($this->result)-1);
			$this->result.=$this->obj1.",";
			
			
			}
		}

		 $this->result=substr($this->result,0,strlen($this->result)-1);
		$this->result=$this->result.$this->obj1;




	}
	
	public function getresult(){


		return $this->result;
	}
public static  function create_massage($value_array){
	//$value=array();
	$f=array("handle1"=>array("name"=>$value_array[0],"error"=>$value_array[1],"handle_type"=>$value_array[2]),"bordy1"=>array("name"=>$value_array[3],"data"=>$value_array[4],"type"=>$value_array[5]));
	$fr=new write_json();
	$fr->name=$f;
	$fr->prase_json();
echo	$fr->getresult();
	
	
}
public  function array_json($r){
$str="";
foreach ($r as $value){

$str=$str."\"".$value."\",";



}
$str=substr($str,0,strlen($str)-1);

return $result="[".$str."]";

}






}
/**
$r=new write_json();

$d=array("dd"=>array("f"=>"gf","g"=>"re"),"sa"=>array("w"=>"wq","ds"=>"dfd"),"d1d"=>array("f"=>"gf","g"=>"re"),"d12d"=>array("f"=>"gf","g"=>"re"));
$r->name=$d;
$r->prase_json();
echo $r->getresult();*/


 

