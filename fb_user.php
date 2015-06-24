<?php

if (!empty($_SESSION['ses_fbid'])) {
	  $sql_host = '';
      $sql_user = '';
      $sql_pass = '';
      $sql_db = '';

      mysql_connect($sql_host,$sql_user,$sql_pass)or die(mysql_error());
      mysql_select_db($sql_db);
      mysql_query('set NAMES utf8');

      $fbid = $_SESSION['ses_fbid'];

      $sql_checkuser = "SELECT *from anypic2u_user where fbid='$fbid'";
      $sql_queryuser = mysql_query($sql_checkuser);
      $user_name = mysql_result($sql_queryuser, 0, 'name');
      $vip = mysql_result($sql_queryuser, 0,'donate');

      ?> 
      
      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="https://graph.facebook.com/<?php echo $_SESSION['ses_fbid']; ?>/picture" width='30' hight='30'> <?php echo $user_name; ?> <?php
      if ($vip == 1) {
            echo "<img src='img/star.png' title='ผู้บริจาก' width='20' hight='20' \>";
      }else if ($vip == 2){
            $today_date=date("Y-m-d");
            $sql_checkvipdate = "SELECT * from anypic2u_vipdate where fbid='$fbid'";
            $sql_queryvipdate = mysql_query($sql_checkvipdate);
            $vipdate = mysql_result($sql_queryvipdate, 0, 'date');

            if ($today_date >= $vipdate) {
                  $sql_updatevipdate = "DELETE from anypic2u_vipdate WHERE fbid='$fbid'";
                  $sql_updatevipquery = mysql_query($sql_updatevipdate);

                  $sql_updatevipuser = "UPDATE anypic2u_user Set donate=0 where fbid='$fbid'";
                  $sql_updatevipuserquery = mysql_query($sql_updatevipuser);

            }else{
                  echo "<img src='img/star2.png' title='ผู้บริจาก' width='20' hight='20' \>";
            }

      } 


      ?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="modal" data-target="#set_security">สร้าง/ปรับเปลี่ยนรหัสผ่านเข้าสู่ระบบแบบครั้งเดียว</a></li>
                        <li><a href="#" onClick="javascript:alert('เร็วๆนี้')">ตัวเลือก</a></li>
                        <li class="divider"></li>
                        <li><a href="fb_gateway.php?a=logout">ออกจากระบบ</a></li>
                  </ul>
             </li>
       <?php
}else{
//      echo '<a class="lightwindow page-options" params="lightwindow_type=external" title="Anypic2u Login via Facebook" href="fb_gateway.php" rel="null"><img src="images/fblogin1.png" /></a>';
	echo '<a href="fb_gateway.php"><img src="img/fblogin1.png" /></a>';
}
?>
