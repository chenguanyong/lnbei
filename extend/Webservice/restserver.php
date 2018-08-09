<?php

$DEFAULT_ACTION = 'badAction';

$pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';

$pathParts = explode('/', substr($pathInfo, 1));
$action = isset($pathParts[0]) ? $pathParts[0] : $DEFAULT_ACTION;

if(function_exists($action)) {
  $action($pathParts);
} else {
  badAction();
}


//REST functions 

function badAction($parts = null) {
  print 'The function specified is invalid';
}

function sayHello($parts) {
  $name = isset($parts[1]) ? $parts[1] : 'undefined';
  $xml = new SimpleXMLElement('<message>Hello, ' . $name . '</message>');
  header('Content-Type: text/xml');
  print $xml->asXML();
}

?>