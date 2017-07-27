<?php
require 'forming.php';
  require_once 'lib/nusoap.php';
  
  //Next, instantiate an instance of the soap_server class.
  $server = new soap_server();
 
  //Try to prevent the wsdl caching
  ini_set("soap.wsdl_cache_enabled", "0");
  
  //The next line is used to tell NuSOAP information for the WSDL document it is going to create for us. 
  //Specifically we specify the name of the server and the namespace, in that order
  $server->configureWSDL("Portal Service", "http://thaisecuremail.com/server.php/");
  
  //Now, we register the function we created with the SOAP server. 
  //We pass several different parameters to the register method.
  $server->register("multiplechoice",
          array("subject" => "xsd:string"), 
          array("return" => "xsd:string")
          //"urn:multiplechoicequestion",
         // "http://localhost/phpwebserve/server.php/multiplechoice"
);
  
  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
  $server->service($HTTP_RAW_POST_DATA);
