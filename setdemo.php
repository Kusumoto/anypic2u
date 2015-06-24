<?php session_start();
    if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}
include('db_connect.php');
$today_date=date("Y-m-d");
$donate_date = date('Y-m-d', strtotime($today_date. ' + 1 Days'));

      $today_time=date("G:i:s");
      $usergent=$_SERVER["HTTP_USER_AGENT"];

  if (getenv(HTTP_X_FORWARDED_FOR))
        $ip=getenv(HTTP_X_FORWARDED_FOR);
    else
        $ip=getenv(REMOTE_ADDR);


$link = new mysqli($host,$user,$pass,$db);
   if ($link->connect_error) {
      die("Error : ".mysqli_connect_errno());
   }
echo '<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />';
   $link->set_charset("utf8");
   $fbid = $_SESSION['ses_fbid'];

   $queryuser_user = $link->query("SELECT * from anypic2u_user WHERE fbid='$fbid'");
   //$num_rows_user = $queryuser_user->num_rows;
   while($row = $queryuser_user->fetch_array(MYSQLI_BOTH)) {
      $donate = $row['donate'];
   }

   if($donate == 1 || $donate == 2) {
   	echo "สถานะของคุณเป็น Donater อยู่แล้ว</br>";
   	echo "<a href='javascript:window.history.back(1);'>ย้อนกลับ</a>";
   	exit();
   }

   $queryuser_coin = $link->query("SELECT * from anypic2u_user WHERE fbid='$fbid' AND donate=0 AND demo=1");
   $num_rows_coin = $queryuser_coin->num_rows;

   if ($num_rows_coin != 0) {
   	echo "คุณใช้สิทธิ์นี้ไปแล้ว!</br>";
   	echo "<a href='javascript:window.history.back(1);'>ย้อนกลับ</a>";
   	exit();
   }else{
   	
   	$link->query("UPDATE anypic2u_user Set donate=2,demo=1 WHERE fbid='$fbid'");
	$link->query("INSERT into anypic2u_vipdate (`fbid`,`date`) values ('{$fbid}','{$donate_date}')");
   $logsave = $link->query("INSERT into anypic2u_loginlog (`fbid`,`date`,`time`,`ugent`,`action`,`ip`) values ('{$fbid}','{$today_date}','{$today_time}','{$usergent}','USEDEMO','{$ip}')");

	echo "การลงทะเบียนเปลี่ยน Class เสร็จสมบูรณ์</br>";
   	echo "<a href='javascript:window.history.back(1);'>ย้อนกลับ</a>";

   }


 ?>