<?php
namespace com\lnbei\city;
class City {
    private  $mysql;
	public function __construct(){
	    
	     $this->mysql = new mysqli_("linbei_work");
	}

	public function getprovincelist($id){
		$sql = "select linkageid , name from system_linkage where keyid = '".$id."' and linkageid < 36 ";
		$result = $this->mysql->read($sql);
		if($result == false){
		    write_json::create_massage(array("xml","bucunzai","string","1","1","1"));
		    return false;
		}else {
			$xml = new  write_json();
			$xml->name = $result;
			$xml->prase_json();
		    $xml->getresult();
			return true;
		}
	}

	public  function getcitylist($city){
	
	    $sql = "select linkageid , name from system_linkage where keyid = '".$id."' and linkageid < ".$city;
		$result = $this->mysql->read($sql);
		if($result == false){
		    write_json::create_massage(array("xml","bucunzai","string","1","1","1"));
		    return false;
		}else
		{
			$xml = new  write_json();
			$xml->name = $result;
			$xml->prase_json();
			$xml->getresult();
			return true;
		}
	}
}
			
			
function main(){
	$get = $_POST['c'];
	$city_id= $_POST['t'];
	if(!empty($get) && is_numeric(intval($get))){
	   exit;
	}
	if(!empty($city_id) && is_numeric(intval($city_id))){
	   exit;
	}
	$c = new City();
	switch ($get)
	{ 
	    case 0:$c->getprovincelist("1");break;
	    case 1:$c->getcitylist($cityid); break;
	}
	exit;
}
			
			

