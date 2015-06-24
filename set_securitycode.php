<?php
session_start();

if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Anypic2u - Your Movies Your Select!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Anypic2u - เป็นเว็บไซต์รวบรวมความบันเทิงครบครัน ไม่ว่าจะเป็นภาพยนตร์ต่างประเทศ ละคร ซีรี่ส์ต่างๆ">
    <meta name="author" content="Kusumoto">
    <link rel="icon" href="img/logo1.png" type="image/x-icon"/>

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
   <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">-->

  </head>
  <body>
  
  <?php
  include('db_connect.php');
  $fbid = $_SESSION['ses_fbid'];
  
  $link = new mysqli($host,$user,$pass,$db);
  if ($link->connect_error) {
    die('Error : '.mysqli_connect_errno());
  }
  $link->set_charset("utf8");

  $sql_checkuser = $link->query("SELECT * from anypic2u_user where fbid='$fbid'");
  
  $i=0;
  while($row = $sql_checkuser->fetch_array(MYSQLI_BOTH)){
    $user_name = $row['name'];
    $vip = $row['donate'];
    $passcode = $row['passcode'];
  }


  if ($_GET['action'] == "save") {
      if ($vip == 0){
    echo "<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>คุณไม่ได้เป็นสมาชิกแบบ Donater ไม่สามารถกำหนดรหัสผ่านได้</div>";
    exit;
  }
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $sql_checkpasscode = $link->query("SELECT * from anypic2u_user where fbid!='$fbid' AND passcode='$new_password'");
    $sql_numchkpasscode = $sql_checkpasscode->num_rows;


      if (empty($passcode)) {

        if ($sql_numchkpasscode != 0) {
          echo '<center><a href="javascript:window.history.back(1)" class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
          exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>รหัสนี้ใช้งานไม่ได้ โปรดเปลี่ยนรหัสครับ</div>");
        }
        if ($new_password != $confirm_password) {
          echo '<center><a href="javascript:window.history.back(1)" class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
          exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>คุณใส่รหัสไม่ตรงกัน 2 ช่อง</div>");
        }
        if (!is_numeric($new_password)) {
           echo '<center><a class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
           exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>กรุณาใส่เฉพาะตัวเลข</div>");
        }
        if (strlen($new_password) != 8) {
          echo '<center><a href="javascript:window.history.back(1)" class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
          exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>กรุณากรอกรหัสผ่านตัวเลข 8 ตัวเท่านั้น</div>");
        }
        $link->query("UPDATE anypic2u_user Set passcode='$new_password' WHERE fbid='$fbid'");
        echo "<div class=\"alert alert-info\"><strong>โปรดทราบ : </strong>คุณตั้งรหัสเรียบร้อยแล้วครับ</div>";

  }else{

        if ($sql_numchkpasscode != 0) {
        echo '<center><a href="javascript:window.history.back(1)" class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
        exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>รหัสนี้ใช้งานไม่ได้ โปรดเปลี่ยนรหัสครับ</div>");
        }
        if ($passcode != $old_password) {
          echo '<center><a href="javascript:window.history.back(1)" class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
          exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>กรุณากรอกรหัสเก่าให้ถูกต้อง</div>");
        }
        if ($new_password != $confirm_password) {
          echo '<center><a href="javascript:window.history.back(1)" class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
          exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>คุณใส่รหัสไม่ตรงกัน 2 ช่อง</div>");
        }
        if (!is_numeric($new_password)) {
          echo '<center><a href="javascript:window.history.back(1)" class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
           exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>กรุณาใส่เฉพาะตัวเลข</div>");
        }
        if (strlen($new_password) != 8) {
          echo '<center><a href="javascript:window.history.back(1)" class="btn btn-large btn-primary" type="button">กลับไปแก้ไข</a></center></br>';
          exit("<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>กรุณากรอกรหัสผ่านตัวเลข 8 ตัวเท่านั้น</div>");
        }
        $link->query("UPDATE anypic2u_user Set passcode='$new_password' WHERE fbid='$fbid'");
        echo "<div class=\"alert alert-info\"><strong>โปรดทราบ : </strong>คุณเปลี่ยนรหัสเรียบร้อยแล้วครับ</div>";

  }

}else{
  
  if ($vip == 0){
    echo "<div class=\"alert alert-error\"><strong>ผิดพลาด : </strong>คุณไม่ได้เป็นสมาชิกแบบ Donater ไม่สามารถกำหนดรหัสผ่านได้</div>";
    exit;
  }

  if (empty($passcode)) {
    echo "<div class=\"alert alert-info\"><strong>โปรดทราบ : </strong>คุณกำลังเข้าสู่การกำหนดรหัสผ่านครั้งแรก รหัสผ่านจะต้องประกอบด้วยตัวเลข 8 ตัวเท่านั้น ห้ามมากหรือน้อยกว่านี้</div>";
    echo '<form class="form-horizontal" action="set_securitycode.php?action=save" method="POST">';
    echo '<div class="control-group">';
    echo '<label class="control-label" for="inputPassword">Password ที่ต้องการ</label>
            <div class="controls">
              <input type="password" name="new_password" id="new_password" placeholder="Password">
            </div>
          </div>';
  echo '<label class="control-label" for="inputPassword">ยืนยัน Password</label>
            <div class="controls">
              <input type="password" name="confirm_password" id="confirm_password" placeholder="Password">
            </div>
          </div></br>';
  echo ' <div class="control-group">
<div class="controls"><button type="submit" class="btn btn-primary">ตั้งรหัสผ่าน</button></div></div>';      
   echo '</form>';        
  }else{
    echo "<div class=\"alert alert-info\"><strong>โปรดทราบ : </strong>คุณกำลังเข้าสู่การเปลี่ยนรหัสผ่าน</div>";
    echo '<form class="form-horizontal" action="set_securitycode.php?action=save" method="POST">';
     echo '<div class="control-group">';
    echo '<label class="control-label" for="inputPassword">Password เก่าของคุณ</label>
            <div class="controls">
              <input type="password"  name="old_password" id="old_password" placeholder="Password">
            </div>
          </div>';
    echo '<div class="control-group">';
    echo '<label class="control-label" for="inputPassword">Password ที่ต้องการ</label>
            <div class="controls">
              <input type="password"  name="new_password" id="new_password" placeholder="Password">
            </div>
          </div>';
  echo '<label class="control-label" for="inputPassword">ยืนยัน Password</label>
            <div class="controls">
              <input type="password"  name="confirm_password" id="confirm_password" placeholder="Password">
            </div>
          </div></br>';
  echo ' <div class="control-group">
<div class="controls"><button type="submit" class="btn btn-primary">เปลี่ยนรหัสผ่าน</button></div></div>';      
   echo '</form>';
  }
  }
  ?>
