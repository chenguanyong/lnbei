<?php
namespace com\lnbei\db\driver;
use com\lnbei\db\Drive;
/**
 * 操作mysql数据库
 * @author Administrator
 *
 */
class LBMySQLI implements Drive{
	/**
	 * 
	 * @var \mysqli
	 */
	private $db;
	private $host;
	private $name;
	private $password;
	private $port;
	
	public function __construct($host,$name,$password,$dbname,$port=3306){
		$this->host=$host;//"192.168.0.105";
		$this->name=$name;//"root";
		$this->password=$password;//"110";
		$this->port=$port;
		$this->db=new \mysqli($this->host,$this->name,$this->password,$dbname,$this->port);
	}
	public function close(){
	    @$this->db->close();
	}
    	
    public function __destruct(){
        self::close();
    }		
		

    public function creatstrsql($strarray,$mode,$where=""){
    	$f="";
    	switch($mode){
    		case 'select':	$f="select";break;
    	}
    	if($f===""){
    		return false;
    	}
    	$g="";
    	foreach($strarray as $key=>$value){
    		 $g=$g.$key;
    		foreach ($value as $key1=>$value1){
    			
    			if($key==="from"){
    				$g=$g." ".$value1." ";
    			}
    			if($key===$mode){
    				$g=$g." ".$value1." ";
    			}
    		}}
    		if($where==""){
    			return $g;
    		}else return  $g.$where;
    	}
	public function createsqlinsert($arra){
		$key1="";
		$value1="";
		foreach ($arra[1] as $key=>$value){
		  $key1.=$key.",";
		  $value1.="'".$value."',";
		}
		$key1=substr($key1,0,strlen($key1)-1);
		$value1=substr(trim($value1),0,strlen($value1)-1);
		return $f=$arra[0]." ( ".$key1." ) "." values "." ( ".$value1." ); ";
	}
	//创建插入语句
	private function createsqlinsert1($arra){
		$key1="";
		$value1="";
		$int_count=0;
		foreach ($arra[1] as $key=>$value){
			$lo=strlen($key);
		    $key1.=substr($key,0, $lo-2).",";
		    if($arra[2][$int_count]==0){
		      $value1.="'".$value."',";
		    }else{
		      $value1.=" ".$value." ,";
		    }
			$int_count ++;
		}
		$key1=substr($key1,0,strlen($key1)-1);
		$value1=substr(trim($value1),0,strlen($value1)-1);
	    $f=$arra[0]." ( ".$key1." ) "." values "." ( ".$value1." ); ";
	    return  $f;		
	}
	
    /**
     * 查询SQL
     */
    public function query($sql){
        if($result=$this->db->query($sql)){
            return $result;
        }else { return false;}
    }
    /**
     * 执行没有结果的查询
     * @param string $sql
     */
    public function freeResult($sql){
        
        return self::query($sql);
    }

    /**
     * 返回最后插入的ID
     */
    public function insertID(){
        
        return $this->db->insert_id;
    }
    /**
     * 返回受影响的行数
     */
    public function affectedRows(){
        
       return $this->db->affectedRows;
    }
    /**
     * 插入数据
     */
    public function insert($table, $data, $replace = false, $pre = true){
        $array = array();
        if(!$replace){
            
            $array[0] = "insert into " . $table . " ";
        }else{
            $array[0] = "replace into " . $table . " ";
        }
        $sql = self::createsqlinsert1($array);
        return $this->query($sql);
    }
    /**
     * 更新数据
     */
    public function update($table, $data, $where, $pre = true){}
}
	//$mj=new mysqli_("username");
	//$r=array("select"=>array("*"),"from"=>array("userdata"));
	////$mj->creatstrsql($r, "select");
//echo 	$mj->createsqlinsert(array("insert into userdata",array("ser"=>"ds")));
//$result=$mj->read2(array("select"=>array("*"),"from"=>array("userdata")),"select","");
//	print_r($mj->search($result));
