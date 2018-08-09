<?php
$client = new SoapClient(
"http://webservices.amazon.com/AWSECommerceService/AWSECommerceService.wsdl");
var_dump($client->__getFunctions());
?>