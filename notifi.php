<?php session_start(); 
if (empty($_SESSION['ses_fbid']))
  header("Location: index.php");
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
   <script>
            
window.onload = function() {
   document.getElementById("load").style.display = "none";
}

function rm(type,id,i){
  $.get('bookmarking_test.php',{action:'remove',type:type,id:id},function(data){$('#book_'+type+'_'+i).html(data);});
}

</script>


    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=372632369514370";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php"><img src="img/logo.png"></a>
           <ul class="nav pull-right">
          <li class="divider-vertical"></li>
              <?php include('fb_user.php'); ?>
            </ul>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php"><i class="icon-home"></i> Home</a></li>
              <li><a href="sys_status.php"><i class="icon-signal"></i> System Status</a></li>
              <li><a href="#"><i class="icon-play"></i> Player</a></li>
              <li class="active"><a href="notifi.php"><i class="icon-bullhorn"></i> Notification</a></li>
              <li><a href="donate.php"><i class="icon-info-sign"></i> Donate <img src="img/donate_notif.png" \></a></li>
              <li><a href="invite.php"><i class="icon-share"></i> Invite</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="container-fluid">
  <div class="alert alert-error">
  <?php include('notification_new.php'); ?>
</div>
<div class="alert alert-warning" id="load">
  <p><img src='img/20-0.gif' border='0'>  <strong>หน้านี้จะใช้เวลาโหลดสักครู่นะครับ โปรดรอจนกว่าหน้านี้จะโหลดเสร็จ</strong></p>
</div>
<center><div class="fb-like-box" data-href="https://www.facebook.com/zxpic" data-width="500" data-height="210" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div></center>
      </br>
      <h1>Notification</h1>
      <small>ศูนย์ข้อมูลการแจ้งเตือนระบบ Bookmark มีไว้สำหรับ Bookmark ซีรี่ย์ที่คุณต้องการติดตามเอาไว้ เช่น คุณจะเปลี่ยนเครื่องคอมพิวเตอร์หรืออุปกรณ์พกพา คุณสามารถ Login แล้วเข้ามาติดตามซีรี่ย์ของคุณแบบต่อเนื่องได้</small>
      </br>
      <?php
      include("db_connect.php");
      mysql_connect($sql_host,$sql_user,$sql_pass)or die(mysql_error());
      mysql_select_db($sql_db);
      mysql_query('set NAMES utf8');

      $fbid = $_SESSION['ses_fbid'];

      $sql_checkuser = "SELECT * from anypic2u_user where fbid='$fbid'";
      $sql_queryuser = mysql_query($sql_checkuser);
      $vip = mysql_result($sql_queryuser, 0,'donate');

      if ($vip == 1 || $vip == 2) { ?>
      <h3>Anime</h3>
      <?php
      $sql_checkbookmark_m2 = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='m2'";
      $sql_querybookmark_m2 = mysql_query($sql_checkbookmark_m2);
      $sql_numrowsbookmark_m2 = mysql_num_rows($sql_querybookmark_m2);

      if ($sql_numrowsbookmark_m2 == 0) {
        echo "<h4><i>ไม่พบการ Bookmark ใดๆ</i></h4>";
      }else{
        echo "<ul>";
        $i=0;
        while($i < $sql_numrowsbookmark_m2) {
            $fetcharr = mysql_fetch_array($sql_querybookmark_m2);
            $movie_id = $fetcharr['movie_id'];
            $movie_name = $fetcharr['movie_name'];

            echo "<li><a href='getlink.php?type=m2&id=$movie_id' target='_blank'>$movie_name</a> <a href=\"javascript:void()\" name=\"book_m2_$i\" id=\"book_m2_$i\" class=\"btn-danger btn-small\" onclick=\"rm('m2',$movie_id,$i)\"><i class=\"icon-bookmark\"></i> เลิกติดตามเรื่องนี้</a> 
</li>";
            $i++;
        }
        echo "</ul>";
      }
      ?>
      <h3>Thai Drama</h3>
      <?php
      $sql_checkbookmark_m3 = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='m3'";
      $sql_querybookmark_m3 = mysql_query($sql_checkbookmark_m3);
      $sql_numrowsbookmark_m3 = mysql_num_rows($sql_querybookmark_m3);

      if ($sql_numrowsbookmark_m3 == 0) {
        echo "<h4><i>ไม่พบการ Bookmark ใดๆ</i></h4>";
      }else{
        echo "<ul>";
        $i=0;
        while($i < $sql_numrowsbookmark_m3) {
            $fetcharr = mysql_fetch_array($sql_querybookmark_m3);
            $movie_id = $fetcharr['movie_id'];
            $movie_name = $fetcharr['movie_name'];

            echo "<li><a href='getlink.php?type=m3&id=$movie_id' target='_blank'>$movie_name</a> <a href=\"javascript:void()\" name=\"book_m3_$i\" id=\"book_m3_$i\" class=\"btn-danger btn-small\" onclick=\"rm('m3',$movie_id,$i)\"><i class=\"icon-bookmark\"></i> เลิกติดตามเรื่องนี้</a> 
</li>";
            $i++;
        }
        echo "</ul>";
      }
      ?>
      <h3>International Series</h3>
      <?php
      $sql_checkbookmark_m4 = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='m4'";
      $sql_querybookmark_m4 = mysql_query($sql_checkbookmark_m4);
      $sql_numrowsbookmark_m4 = mysql_num_rows($sql_querybookmark_m4);

      if ($sql_numrowsbookmark_m4 == 0) {
        echo "<h4><i>ไม่พบการ Bookmark ใดๆ</i></h4>";
      }else{
        echo "<ul>";
        $i=0;
        while($i < $sql_numrowsbookmark_m4) {
            $fetcharr = mysql_fetch_array($sql_querybookmark_m4);
            $movie_id = $fetcharr['movie_id'];
            $movie_name = $fetcharr['movie_name'];

            echo "<li><a href='getlink.php?type=m4&id=$movie_id' target='_blank'>$movie_name</a> <a href=\"javascript:void()\" name=\"book_m4_$i\" id=\"book_m4_$i\" class=\"btn-danger btn-small\" onclick=\"rm('m4',$movie_id,$i)\"><i class=\"icon-bookmark\"></i> เลิกติดตามเรื่องนี้</a> 
</li>";
            $i++;
        }
        echo "</ul>";
      }
      ?>
      <h3>Korea Series</h3>
      <?php
      $sql_checkbookmark_m5 = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='m5'";
      $sql_querybookmark_m5 = mysql_query($sql_checkbookmark_m5);
      $sql_numrowsbookmark_m5 = mysql_num_rows($sql_querybookmark_m5);

      if ($sql_numrowsbookmark_m5 == 0) {
        echo "<h4><i>ไม่พบการ Bookmark ใดๆ</i></h4>";
      }else{
        echo "<ul>";
        $i=0;
        while($i < $sql_numrowsbookmark_m5) {
            $fetcharr = mysql_fetch_array($sql_querybookmark_m5);
            $movie_id = $fetcharr['movie_id'];
            $movie_name = $fetcharr['movie_name'];

            echo "<li><a href='getlink.php?type=m5&id=$movie_id' target='_blank'>$movie_name</a> <a href=\"javascript:void()\" name=\"book_m5_$i\" id=\"book_m5_$i\" class=\"btn-danger btn-small\" onclick=\"rm('m5',$movie_id,$i)\"><i class=\"icon-bookmark\"></i> เลิกติดตามเรื่องนี้</a> 
</li>";
            $i++;
        }
        echo "</ul>";
      }
      ?>
       <h3>Cartoon Live!</h3>
      <?php
      $sql_checkbookmark_m6 = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='m6'";
      $sql_querybookmark_m6 = mysql_query($sql_checkbookmark_m6);
      $sql_numrowsbookmark_m6 = mysql_num_rows($sql_querybookmark_m6);

      if ($sql_numrowsbookmark_m6 == 0) {
        echo "<h4><i>ไม่พบการ Bookmark ใดๆ</i></h4>";
      }else{
        echo "<ul>";
        $i=0;
        while($i < $sql_numrowsbookmark_m6) {
            $fetcharr = mysql_fetch_array($sql_querybookmark_m6);
            $movie_id = $fetcharr['movie_id'];
            $movie_name = $fetcharr['movie_name'];

            echo "<li><a href='getlink.php?type=m6&id=$movie_id' target='_blank'>$movie_name</a> <a href=\"javascript:void()\" name=\"book_m6_$i\" id=\"book_m6_$i\" class=\"btn-danger btn-small\" onclick=\"rm('m6',$movie_id,$i)\"><i class=\"icon-bookmark\"></i> เลิกติดตามเรื่องนี้</a> 
</li>";
            $i++;
        }
        echo "</ul>";
      }
      ?>
      <h3>Japan Series!</h3>
      <?php
      $sql_checkbookmark_m7 = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='m7'";
      $sql_querybookmark_m7 = mysql_query($sql_checkbookmark_m7);
      $sql_numrowsbookmark_m7 = mysql_num_rows($sql_querybookmark_m7);

      if ($sql_numrowsbookmark_m7 == 0) {
        echo "<h4><i>ไม่พบการ Bookmark ใดๆ</i></h4>";
      }else{
        echo "<ul>";
        $i=0;
        while($i < $sql_numrowsbookmark_m7) {
            $fetcharr = mysql_fetch_array($sql_querybookmark_m7);
            $movie_id = $fetcharr['movie_id'];
            $movie_name = $fetcharr['movie_name'];

            echo "<li><a href='getlink.php?type=m7&id=$movie_id' target='_blank'>$movie_name</a> <a href=\"javascript:void()\" name=\"book_m7_$i\" id=\"book_m7_$i\" class=\"btn-danger btn-small\" onclick=\"rm('m7',$movie_id,$i)\"><i class=\"icon-bookmark\"></i> เลิกติดตามเรื่องนี้</a> 
</li>";
            $i++;
        }
        echo "</ul>";
      }
      ?>
       <h3>SitCom Movie</h3>
      <?php
      $sql_checkbookmark_m9 = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='m9'";
      $sql_querybookmark_m9 = mysql_query($sql_checkbookmark_m9);
      $sql_numrowsbookmark_m9 = mysql_num_rows($sql_querybookmark_m9);

      if ($sql_numrowsbookmark_m9 == 0) {
        echo "<h4><i>ไม่พบการ Bookmark ใดๆ</i></h4>";
      }else{
        echo "<ul>";
        $i=0;
        while($i < $sql_numrowsbookmark_m9) {
            $fetcharr = mysql_fetch_array($sql_querybookmark_m9);
            $movie_id = $fetcharr['movie_id'];
            $movie_name = $fetcharr['movie_name'];

            echo "<li><a href='getlink.php?type=m9&id=$movie_id' target='_blank'>$movie_name</a> <a href=\"javascript:void()\" name=\"book_m9_$i\" id=\"book_m9_$i\" class=\"btn-danger btn-small\" onclick=\"rm('m9',$movie_id,$i)\"><i class=\"icon-bookmark\"></i> เลิกติดตามเรื่องนี้</a> 
</li>";
            $i++;
        }
        echo "</ul>";
      }
      ?>
       <h3>Korea Variety</h3>
      <?php
      $sql_checkbookmark_m10 = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='m10'";
      $sql_querybookmark_m10 = mysql_query($sql_checkbookmark_m10);
      $sql_numrowsbookmark_m10 = mysql_num_rows($sql_querybookmark_m10);

      if ($sql_numrowsbookmark_m10 == 0) {
        echo "<h4><i>ไม่พบการ Bookmark ใดๆ</i></h4>";
      }else{
        echo "<ul>";
        $i=0;
        while($i < $sql_numrowsbookmark_m10) {
            $fetcharr = mysql_fetch_array($sql_querybookmark_m10);
            $movie_id = $fetcharr['movie_id'];
            $movie_name = $fetcharr['movie_name'];

            echo "<li><a href='getlink.php?type=m10&id=$movie_id' target='_blank'>$movie_name</a> <a href=\"javascript:void()\" name=\"book_m10_$i\" id=\"book_m10_$i\" class=\"btn-danger btn-small\" onclick=\"rm('m10',$movie_id,$i)\"><i class=\"icon-bookmark\"></i> เลิกติดตามเรื่องนี้</a> 
</li>";
            $i++;
        }
        echo "</ul>";
      }
     } else {
     echo "<h3>หน้านี้ ใช้งานได้เฉพาะสมาชิก Donater เท่านั้น!</h3>";
}
      ?>

      <div id="set_security" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="security_title" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="security_title">สร้าง/ปรับเปลี่ยนรหัสผ่านเข้าสู่ระบบแบบครั้งเดียว</h3>
        </div>
      <div class="modal-body">
     <iframe width="100%" height="260px" frameborder="0" scrolling="no" allowtransparency="true" src="set_securitycode.php"></iframe>
      </div>
   <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> ปิด</button>
    </div>
</div>
      
      <footer>
        <hr>
        <p class="pull-right"><!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="counter free hit invisible" ><script  type="text/javascript" >
try {Histats.start(1,2414640,4,110,145,23,"00000001");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2414640&101" alt="counter free hit invisible" border="0"></a></noscript>
<!-- Histats.com  END  --><a href="#">Back to top</a></p>
        <p>&copy; 2013 Anypic2u by Kusumoto <script type="text/javascript" language="javascript1.1" src="http://tracker.stats.in.th/tracker.php?sid=50590"></script><noscript><a target="_blank" href="http://www.stats.in.th/">www.Stats.in.th</a></noscript></p>
      </footer>
  </div>
  

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>