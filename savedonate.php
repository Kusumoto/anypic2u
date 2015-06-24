<?php
session_start();
include("db_connect.php");
$fbid = $_SESSION['ses_fbid'];
$donate_total = $_POST['donate_total'];
$date = $_POST['date'];
$bank = $_POST['bank'];

if (empty($fbid)) {
	echo "กรุณาเข้าสู่ระบบก่อน";
	exit();
}

if (empty($donate_total)) {
	echo "กรุณาใส่เงินด้วยครับ";
	exit();
}
if (empty($date)) {
	echo "กรุณาใส่วันที่โอนด้วยครับ";
	exit();
}

if (empty($bank)) {
	echo "กรุณาเลือกธนาคารครับ";
	exit();	
}

mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($db);
mysql_query("set NAMES utf8");

$sql = "INSERT into anypic2u_donate (fbid,donate_total,donate_date,bank) values ('{$fbid}','{$donate_total}','{$date}','{$bank}')";
$sql_query = mysql_query($sql) or die(mysql_error());

echo "บันทึกข้อมูลเรียบร้อยแล้ว กรุณารอประมาณ 2 ซม. หากภายในเวลาดังกล่าวยังไม่ได้รับการปรับระดับหรือ Invite โปรดติดต่อ kusumoto_ton@yahoo.com";

?>