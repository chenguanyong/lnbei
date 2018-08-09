<?php function sayHello($name){
   $salutation = "You, $name, will be delighted to know I am working!";
   return $salutation;
}
//echo sayHello('sdfad');
try{
$server = new SoapServer ("greetings.wsdl");
$server->addFunction("sayHello");
$server->handle();}catch( SoapFault $f){
	
	echo $f->getCode();
	echo $f->getMessage();
	var_dump($f);
}


?>