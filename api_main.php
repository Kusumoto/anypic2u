<?php
 //error_reporting(E_ALL);
 //ini_set("display_errors", 1);
include("obj_func.php");
if (empty($_GET)) {
	exit('Error GET API!');
}

$token = $_GET['token'];


if (empty($token)){
	exit('Error API Token');
}

$token = addslashes($token);
$token = trim($token);

include('db_connect.php');
$link = new mysqli($host,$user,$pass,$db);
if ($link->connect_error) {
	die('Error : '.mysqli_connect_errno());
}

$link->set_charset('utf8');

$chkToken = $link->query("SELECT * from anypic2u_tokenapi WHERE token='$token'");
$Tokennum = $chkToken->num_rows;
if ($Tokennum == 0)
	exit('!|Token Expire Please Re-Open App!');

$objToken = $chkToken->fetch_array(MYSQLI_BOTH);

if ($objToken['token'] == $token) {
	$today_date=date("Y-m-d");
	$dbdate = $objToken['date1'];
	if ($today_date > $dbdate) {
		$delToken = $link->query("DELETE from anypic2u_tokenapi WHERE token='$token'");
		exit('!|Token Expire Please Re-Open App!');
	}else{

$maintype = $_GET['maintype'];
$type = $_GET['type'];
$pid = $_GET['pid'];
$ps = $_GET['ps'];
$orderby = $_GET['orderby'];

if ($maintype == 'm1') {
    $xmlUrl = "http://allnewservice.serviceseries.com/newversion/moviefcService.ashx?";   
    $postdata = http_build_query(
    array(
        'type' => 'serie',
        'pid' => $page,
        'ps' => $ps
     
    )
);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => //'Content-type: application/x-www-form-urlencoded 
                      'User-Agent: com.comicfcapp.moviefciphone/3.0 (unknown, iPhone OS 6.1.3, iPod touch, Scale/2.000000)',
       // 'proxy' => 'tcp://109.205.117.130:8080',
        'content' => $postdata        
    )
);
$context  = stream_context_create($opts);
$xmlStr = file_get_contents($xmlUrl, false, $context);
print_r($xmlStr);

}
if ($maintype == 'm2') {
	$xmlUrl = "http://anime.servicedooeii.com/anime/service.ashx?type=$type&pid=$pid&ps=20&orderby=$orderby";
	$xmlStr = file_get_contents($xmlUrl);
	$xmlObj = simplexml_load_string($xmlStr);
	$arrXml = objectsIntoArray($xmlObj);
	//print_r($arrXml);
	$json = json_encode($arrXml);
	//print_r($json);
	print_r($json);

}
	}
}else{
	exit('!|Token Expire Please Re-Open App!');
}

?>