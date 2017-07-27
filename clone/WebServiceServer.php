<?php
	require_once('lib/nusoap.php');
	
	 $link = mysql_connect("localhost","selected1","selected1");
                if(!$link){
                        die("cannot connect".mysql_error());
		}
                mysql_select_db("selected");
                mysql_query("SET NAMES UTF8");


	//include 'ConnectDB.php';
	include 'function.php';
//        $usr = $_GET(username);
//	$pass = $_GET(password); 
	function login($usr, $pass) {
		$sql = "SELECT `Username`,`Password` FROM `User` WHERE `Username` = '$usr' AND `Password`= '$pass'";
		$res = mysql_query($sql);
		
		$row = mysql_fetch_array($res);
		if($row){
			return TRUE;
		}else {
			return FALSE;
		}
/*	$connection = @ssh2_connect('shell.thaisecuremail.com', 22);

	if (@ssh2_auth_password($connection, $usr,$pass)) {
		return  "Authentication Successful!\n";
		} else {
		return "'Authentication Failed..";
		}

	}
*/	
	/*function getMail($usr) {
	
	/*	$myfile = fopen("dirstruct.xml", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("dirstruct.xml"));
		return $myfile;	
	
		fclose($myfile);	
	*/
//	echo file_get_contents("dirstruct.xml");
	}
	function sendmail($strto, $strSub, $strMessage, $strHead) {
		$flgSend = @mail($strto,$strSub,$strMessage,$strHead);  // @ = No Show Error //
		if($flgSend)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	
		

	$server = new soap_server();

	$ws_server_url = 'thaisecuremail.com';

	$server->configureWSDL('WebService.wsdl', $ws_server_url);

	//$server->register("doHellow", array('name' => 'xsd:string'), array('return' => 'xsd:string'));

//	$server->register("getmail", array('filemail' => 'xsd:string'), array('return' => 'xsd:string'));

	$server->register("login", array('uname' => 'xsd:string', 'pass' => 'xsd:string'), array('return' => 'xsd:boolean'));

	$server->register("sendmail", array('to' => 'xsd:string', 'sub' => 'xsd:string', 'mess' => 'xsd:string', 'head' => 'asd:string'), array('return' => 'xsd:boolean'));

/*	$server->register("getMail", array('usr' => 'xsd:string'), array('form' => 'xsd:string' , 'to' => 'xsd:string', 'subj' => 'xsd:string', 'body' => 'xsd:string'));
*/

	//$server->register("getMail", array('uname' => 'xsd:string'), array('return' => 'xsd:string'));

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

	$server->service($HTTP_RAW_POST_DATA);
?>
