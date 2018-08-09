<?php
$client = new SoapClient(
   "http://webservices.amazon.com/AWSECommerceService/
        AWSECommerceService.wsdl",
   array('trace' => 1, 'exceptions' => 0));

$request = array(
                 'SearchIndex' => 'Books',
                 'Keywords' => 'PHP 6'
                );

$params = array(
                'AWSAccessKeyId' => '[Your Key]',
                'Operation' => 'ItemSearch',
                'Request' => $request
                );

$out = $client->ItemSearchError($params);

if(is_soap_fault($out)) {
  print     "Something went wrong!<br>\n";
  print     $out->faultstring;
  exit;
} else {

  foreach($out->Items->Item as $item) {
    print '<a href="' . $item->DetailPageURL . '">'. 
          $item->ItemAttributes->Title .
          "</a><br>\n";
  }

}
?>