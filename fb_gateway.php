<?php
/*
Anypic2u Facebook Login Gateway
by Kusumoto Computer
http://kusumoto.co
*/

 //error_reporting(E_ALL);
 //ini_set("display_errors", 1);

require 'facebook/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '',
  'secret' => '',
));

echo '<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />';
echo '<link href="css/fb_gateway.css" rel="stylesheet">';
// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

// This call will always work since we are fetching public data.

@$error=$_GET['error'];
if ($error=='access_denied')
  exit('access_denied');

@$a = $_GET['a'];
if ($a == 'logout') {
  session_destroy();
  echo '<div class="corrent">';
  echo '<img src="img/correct.png" class="icon">';
  echo "<p class='message'>คุณได้ออกจากระบบเรียบร้อยแล้ว</p>";
  echo '<center>โปรดรอสักครู่ ระบบกำลังนำท่านไปยังหน้าหลักของเว็บครับ</center>';
  echo '</div>';
  echo '<meta http-equiv="refresh" content="1; url=index.php">';
  echo '<hr>
  <i>Facebook Login Gateway Version 2.0 Stable (SQLi) by Kusumoto</i>';
  exit();
}

?>
    <?php if ($user): ?>
      <?php

      function mysqli_result($result, $num, $field) {
         $i=0;
         $data = '';
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
          if ($i==$num) $data=$row[$field];
          $i++;
    }
    $result->close();
    return $data;
    
  } 

      //Close Web Mode
      if ($user_profile[id] != '100001031071156') {
          echo '<div class="wrong">';
          echo '<img src="img/wrong.png" class="icon">';
          echo "<p class='message'>ไม่อนุญาตให้เข้าใช้งานเว็บไซต์</p>";
          echo '<center>กำลังซ่อมแซมหรือบำรุงรักษาเว็บไซต์ ขออภัยในความไม่สะดวก</center>';
          echo '</div>';
          echo "<hr>
          <i>Facebook Login Gateway Version 2.0 Stable (SQLi) by Kusumoto</i>";
        exit();
      }
      $sql_host = '';
      $sql_user = '';
      $sql_pass = '';
      $sql_db = '';

      $fbid = $user_profile[id];
      $fbname = $user_profile[name];
      $fbid = addslashes($fbid);
      $fbname = addslashes($fbname);

      $today_date=date("Y-m-d");
      $today_time=date("G:i:s");
      $usergent=$_SERVER["HTTP_USER_AGENT"];

  if (getenv(HTTP_X_FORWARDED_FOR))
        $ip=getenv(HTTP_X_FORWARDED_FOR);
    else
        $ip=getenv(REMOTE_ADDR);

      //MySQLi Connector
      $link = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
      if ($link->connect_error) {
          die("Error : ".mysqli_connect_errno());
      }
      //MySQLi Charset
      $link->set_charset("utf8");
      //MySQLi Check User
      $result_user = $link->query("SELECT * from anypic2u_user where fbid='$fbid'");
      $rows_user = $result_user->num_rows;
      //Invite Check and Constructor
      if (!empty($_SESSION['ses_token']) && $rows_user == 0) {
        $token = $_SESSION['ses_token'];
        $token = addslashes($token);
        //MySQLi Check Invite Token
        $result_invitechk = $link->query("SELECT * from anypic2u_invitetoken Where token='$token'");
        $rows_invitechk = $result_invitechk->num_rows;
        $used = mysqli_result($result_invitechk,0,'used'); 

        if ($used != 0) {
            echo '<div class="wrong">';
            echo '<img src="img/wrong.png" class="icon">';
            echo "<p class='message'>ผิดพลาด</p>";
            echo '<center>คำเชิญนี้ถูกใช้งานไปแล้ว</center>';
            echo '</div>';
            echo "<hr>
          <i>Facebook Login Gateway Version 2.0 Stable (SQLi) by Kusumoto</i>";
            exit();
          }

        if ($rows_invitechk == 0) {
            echo '<div class="wrong">';
            echo '<img src="img/wrong.png" class="icon">';
            echo "<p class='message'>ผิดพลาด</p>";
            echo '<center>ไม่พบคำเชิญนี้ในระบบ</center>';
            echo '</div>';
            echo "<hr>
          <i>Facebook Login Gateway Version 2.0 Stable (SQLi) by Kusumoto</i>";
            exit();
          }
          //MySQLi Update Token
          $updatetoken = $link->query("UPDATE anypic2u_invitetoken set used=1,use_id='$fbid' Where token='$token'");
          //MySQLi Save Transection Log
          $logsave = $link->query("INSERT into anypic2u_loginlog (`fbid`,`date`,`time`,`ugent`,`action`,`ip`) values ('{$fbid}','{$today_date}','{$today_time}','{$usergent}','TAKEINVITE','{$ip}')");
          //MySQLi Save User
          $saveuser = $link->query("INSERT into anypic2u_user (fbid,name,pic,time,date1) values ('{$fbid}','{$fbname}','https://graph.facebook.com/$user/picture','$today_time','{$today_date}')");
          //Save User to Session
          $_SESSION['ses_fbid'] = $user_profile[id];
          echo '<div class="corrent">';
          echo '<img src="img/correct.png" class="icon">';
          echo "<p class='message'>คุณได้เข้าสู่ระบบครั้งแรก</p>";
          echo '<center>โปรดรอสักครู่ ระบบกำลังนำท่านไปยังหน้าหลักของเว็บครับ</center>';
          echo '<meta http-equiv="refresh" content="2; url=index.php">';
          echo '</div>';

      //No Invite and User in DB
      }else if ($rows_user == 0) {
         echo '<div class="wrong">';
         echo '<img src="img/wrong.png" class="icon">';
         echo "<p class='message'>ผิดพลาด</p>";
         echo '<center>ยังไม่เปิดรับสมาชิกใหม่ครับ ขออภัยในความไม่สะดวก</center>';
         echo '</div>';
       /*
        //MySQLi Save User
        $saveuser = $link->query("INSERT into anypic2u_user (fbid,name,pic,time,date1) values ('{$fbid}','{$fbname}','https://graph.facebook.com/$user/picture','$today_time','{$today_date}')");
        $_SESSION['ses_fbid'] = $user_profile[id];
        //MySQLi Save Transection Log
        $logsave = $link->query("INSERT into anypic2u_loginlog (`fbid`,`date`,`time`,`ugent`,`action`,`ip`) values ('{$fbid}','{$today_date}','{$today_time}','{$usergent}','NEWUSER','{$ip}')");
        echo '<div class="corrent">';
        echo '<img src="img/correct.png" class="icon">';
        echo "<p class='message'>คุณได้เข้าสู่ระบบครั้งแรก</p>";
        echo '<center>โปรดรอสักครู่ ระบบกำลังนำท่านไปยังหน้าหลักของเว็บครับ</center>';
        echo '<meta http-equiv="refresh" content="2; url=index.php">';
        echo '</div>';
        */
        //User Alrealy Register
        }else{
          //MySQLi Save Transection Log
          $logsave = $link->query("INSERT into anypic2u_loginlog (`fbid`,`date`,`time`,`ugent`,`action`,`ip`) values ('{$fbid}','{$today_date}','{$today_time}','{$usergent}','LOGEDIN','{$ip}')");
          
              $i=0;
              while ($row = $result_user->fetch_array(MYSQLI_BOTH)) {
                  $result2=$row['time'];
                  $result1=$row['date1'];
                  
              $i++;
         }

         // $result1 = mysqli_result($result_user, 0, 'date1');
         // $result2 = mysqli_result($result_user, 0, 'time');

          //MySQLi Update User
          $updateuser = $link->query("UPDATE anypic2u_user Set name='{$fbname}',date1='$today_date',time='$today_time' WHERE fbid='$fbid'");
          
          $_SESSION['ses_fbid'] = $user_profile[id];
          echo '<div class="corrent">';
          echo '<img src="img/correct.png" class="icon">';
         // echo 'ระบบการแสดงข้อมูลเข้าใช้งานครั้งล่าสุด ทำงานผิดพลาด ทีมงานกำลังแก้ไขครับ';
          echo "<p class='message'>เข้าสู่ระบบครั้งสุดท้ายเมื่อ : $result1 เวลา : $result2</p>";
          echo '<center>โปรดรอสักครู่ ระบบกำลังนำท่านไปยังหน้าหลักของเว็บครับ</center>';
        if ($_SESSION['ses_url'] != "http://anypic2u.zapto.org/fb_gateway.php") {
           echo '<meta http-equiv="refresh" content="2; url='.$_SESSION['ses_url'].'">';
        }
        echo '<meta http-equiv="refresh" content="2; url=http://anypic2u.zapto.org/main.php">';
      }
      echo '</div>';
      mysqli_close($link); //Close Connection
      ?>

      <?php else: ?>
      <div>
      <?php $_SESSION['ses_url'] = $_SERVER["HTTP_REFERER"]; ?>
       <?php if (!empty($_GET['invitetoken'])) $_SESSION['ses_token'] = $_GET['invitetoken']; ?>
        <div class="process"><center><img src="img/fb_load.gif"/></center><p class="message">โปรดรอสักครู่...</p></div>
        <meta http-equiv="refresh" content="0; url=<?php echo $loginUrl; ?>">
        <!--<a href="<?php echo $loginUrl; ?>"><img src="images/fblogin1.png" /></a>-->
      </div>
    <?php endif ?>
    <hr>
    <i>Facebook Login Gateway Version 2.0 Stable (SQLi) by Kusumoto</i>








