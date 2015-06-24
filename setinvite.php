<?php session_start();
    if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}
include('db_connect.php');

 $today_date=date("Y-m-d");
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

   $queryuser_coin = $link->query("SELECT * from anypic2u_coin WHERE fbid='$fbid'");
   $num_rows_coin = $queryuser_coin->num_rows;

   if ($num_rows_coin == 0) {
   	echo "คุณมีเงินไม่พอซื้อ Invite ครับ</br>";
   	echo "<a href='javascript:window.history.back(1);'>ย้อนกลับ</a>";
   	exit();
   }else{
   	while($row = $queryuser_coin->fetch_array(MYSQLI_BOTH)) {
   			$coin = $row['coin']; 
   		}
   	if ($coin<20) {
   		echo "คุณมีเงินไม่พอซื้อ Invite ครับ</br>";
   		echo "<a href='javascript:window.history.back(1);'>ย้อนกลับ</a>";
   		exit();
   	}

   	$coin = ($coin-20);

   	$invitechk = $link->query("SELECT * from anypic2u_invite WHERE fbid='$fbid'");
   	$invitechk_num_rows = $invitechk->num_rows;

   	if($invitechk_num_rows == 0) {
   		$link->query("INSERT into anypic2u_invite (`fbid`,`total`) values ('{$fbid}',1)");
   	}else{
   		while($row = $invitechk->fetch_array(MYSQLI_BOTH)){
   			$total = $row['total'];
   		}
   		$total = $total+1;
   		$link->query("UPDATE anypic2u_invite Set total='$total' WHERE fbid='$fbid'");
   	}

   	$link->query("UPDATE anypic2u_coin Set coin='$coin' WHERE fbid='$fbid'");
      $logsave = $link->query("INSERT into anypic2u_loginlog (`fbid`,`date`,`time`,`ugent`,`action`,`ip`) values ('{$fbid}','{$today_date}','{$today_time}','{$usergent}','BUYINVITE','{$ip}')");

	echo "การซื้อ Invite เสร็จสมบูรณ์</br>";
   	echo "<a href='javascript:window.history.back(1);'>ย้อนกลับ</a>";

   }


 ?>