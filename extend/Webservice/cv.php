<?php 


    $client = new SoapClient("http://192.168.1.103/a/server.php?wsdl");

    var_dump($client);
    $result = $client->myfunc('789');
    var_dump($result);
    //echo "The answer isresult";


?>  