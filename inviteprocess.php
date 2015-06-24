<?php
session_start();
include('db_connect.php');


if (empty($_SESSION['ses_fbid'])) {
	header("Location: index.php");
	exit();
}

$email = $_POST['email'];

$email = addslashes($email);

if (empty($email)) {
	echo "กรุณากรอก E-Mail ด้วยครับ";
	exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "กรุณากรอก E-Mail ที่ถูกต้องครับ";
    exit();
}

$fbid = $_SESSION['ses_fbid'];
mysql_connect($host,$user,$pass)or die(mysql_error());
mysql_select_db($db);
mysql_query("set NAMES utf8");

$sql_getinvite = "SELECT * from anypic2u_invite Where fbid='$fbid'";
$sql_queryinvite = mysql_query($sql_getinvite);
$sql_num_rows = mysql_num_rows($sql_queryinvite);
if ($sql_num_rows == 0) {
  $invite = 0;
}else{
  $invite = mysql_result($sql_queryinvite, 0, 'total');
}

if ($invite == 0) {
	echo "คุณไม่มี Invite ในขณะนี้";
	exit();
}

do{
	$token = md5(time());
	$sql_gettoken = "SELECT * from anypic2u_invitetoken Where token='$token'";
	$sql_querytoken = mysql_query($sql_gettoken);
	$sql_num_rows_token = mysql_num_rows($sql_querytoken);
}while($sql_num_rows_token != 0);

$sql_token = "INSERT into anypic2u_invitetoken (token,fbid,used,email) values ('{$token}','{$fbid}',0,'{$email}')";
$sql_tokenprocess = mysql_query($sql_token)or die(mysql_error());

$sql_update = "UPDATE anypic2u_invite set total=($invite-1) where fbid='$fbid'";
$sql_updateprocess = mysql_query($sql_update);



$msg = "เรียนผู้ใช้อีเมล $email \n\n ตอนนี้คุณได้รับ Invite สำหรับเข้าเป็นสมาชิกเว็บไซต์ Anypic2u โดยให้ท่านทำการคลิกลิงค์ที่แนบท้ายในอีเมล เพื่อเป็นการยืนยันการใช้งาน Invite หลังจากนั้น ระบบจะให้ท่าน Connect กับ Facebook ของท่านเพื่อใช้ Facebook ของท่านในการ Login \n\n Link => http://anypic2u.com/takeinvite.php?token=$token \n\n ขอแสดงความนับถือ และหากมีข้อสงสัยใดๆ กรุณาส่งอีเมลมาที่ kusumoto_ton@yahoo.com และกรุณาอย่าตอบเมลฉบับนี้ เพราะไม่มีคนตอบ";
mail($email,'Anypic2u Invite',$msg,'From: invite@anypic2u.com');


echo "ทำการส่ง Invite เรียบร้อยแล้ว หากคนที่คุณ Invite ไม่พบเมลจาก Anypic2u กรุณาดูใน Juck Mail หรือ Spam ครับ";
?>