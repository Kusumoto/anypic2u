<?php
include('db_connect.php');
$link = new mysqli($host,$user,$pass,$db);

if ($link->connect_error) {
	die('Error : '.mysqli_connect_errno());
}

$link->set_charset('utf8');
$Passcode = $_POST['passcode'];

$Passcode = trim($Passcode);

if (empty($Passcode)) {
	exit("0|0|Passcode not empty!");
}

$queryUser = $link->query("SELECT * from anypic2u_user WHERE passcode='$Passcode'");
$numrowsUser = $queryUser->num_rows;
$objResult = $queryUser->fetch_array(MYSQLI_BOTH);

$fbid = $objResult['fbid'];

if ($numrowsUser == 0) 
	{
	echo "0|0|Incorrect Passcode";	
	}
	else
	{
		$chkToken = $link->query("SELECT * from anypic2u_tokenapi WHERE fbid='$fbid'");
		$num_Token = $chkToken->num_rows;
		if ($num_Token == 0) {
			$token = md5(time());
			$today_date=date("Y-m-d");
			$insertToken = $link->query("INSERT into anypic2u_tokenapi (fbid,token,date1) values ('{$fbid}','{$token}','{$today_date}')"); 
			echo "1|".$token."|";	
		}else{
			$obj_Token = $chkToken->fetch_array(MYSQLI_BOTH);
			echo "1|".$obj_Token['token']."|";
		//$_SESSION['ses_fbid_api'] = $objResult["fbid"];
		}
	}


?>

