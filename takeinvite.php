<?php
session_start();
include('db_connect.php');
$token = $_GET['token'];
$token = addslashes($token);
if (empty($token)) {
	header("Location: 404.html");
	exit();
}

mysql_connect($host,$user,$pass)or die(mysql_error());
mysql_select_db($db);
mysql_query("set NAMES utf8");

$sql_checktoken = "SELECT * from anypic2u_invitetoken Where token='$token' AND used=0";
$sql_tokenquery = mysql_query($sql_checktoken);
$sql_token_num_rows = mysql_num_rows($sql_tokenquery);

if ($sql_token_num_rows == 0) {
	header("Location: 404.html");
	exit();
}
echo '<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />';
echo 'การตรวจสอบ Token ของคุณเสร็จสมบูรณ์ พบว่า Token ของคุณมีอยู่จริง โปรดกดปุ่ม Connect with Facebook เพื่อให้ Facebook ของคุณ เชื่อมต่อกับระบบบัญชีของเรา </br>';
echo '<a href="fb_gateway.php?invitetoken='.$token.'"><img src="img/fblogin1.png" /></a>';

?>