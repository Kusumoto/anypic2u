<?php
include("obj_func.php");
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
       <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=372632369514370";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
            $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })

window.onload = function() {
   document.getElementById("load").style.display = "none";
}

</script>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>

<script>
$('.btn btn-primary').button('complete')
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
              <li class="active"><a href="index.php"><i class="icon-home"></i> Home</a></li>
              <li><a href="sys_status.php"><i class="icon-signal"></i> System Status</a></li>
              <li><a href="#"><i class="icon-play"></i> Player</a></li>
              <li><a href="notifi.php"><i class="icon-bullhorn"></i> Notification</a></li>
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
<center><div class="fb-like-box" data-href="https://www.facebook.com/zxpic" data-width="500" data-height="210" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div></center>
</br>
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Home</li>
              <li><a href="index.php">Home</a></li>
              <li class="nav-header">International Movies</li>
              <li><a href="index_m1.php">Movies Update!</a></li>
              <li><a href="search_m1.php">Search Movies!</a></li>
              <li class="nav-header">Anime</li>
              <li><a href="index_m2.php">Anime Update</a></li>
              <li><a href="allmovies_m2.php">Browse Anime</a></li>
              <li><a href="search_m2.php">Search Anime</a></li>
              <li class="nav-header">Thai Drama</li>
              <li><a href="index_m3.php">Thai Drama Update</a></li>
              <li><a href="allmovies_m3.php">Browse Thai Drama</a></li>
              <li><a href="search_m3.php">Search Thai Drama</a></li>
              <li class="nav-header">International Series</li>
              <li><a href="index_m4.php">International Series Update</a> </li>
              <li><a href="allmovies_m4.php">Browse International Series</a></li>
              <li><a href="search_m4.php">Search International Series</a></li>
              <li class="nav-header">Korea Series</li>
              <li><a href="index_m5.php">Korea Series Update</a></li>
              <li><a href="allmovies_m5.php">Browse Korea Series</a></li>
              <li><a href="search_m5.php">Search Korea Series</a></li>
              <li class="nav-header">Cartoon Live!</li>
              <li><a href="index_m6.php">Cartoon Live! Update</a></li>
              <li><a href="allmovies_m6.php">Browse Cartoon Live!</a></li>
              <li><a href="search_m6.php">Search Cartoon Live!</a></li>
              <li class="nav-header">Japan Series <font color="red">New</font></li>
              <li><a href="index_m7.php">Japan Series Update</a></li>
              <li><a href="allmovies_m7.php">Browse Japan Series</a></li>
              <li><a href="search_m7.php">Search Japan Series</a></li>
              <li class="nav-header">Asian Movies <font color="red">New</font></li>
              <li><a href="index_m8.php">Browse Asian Movies</a></li>
              <li><a href="search_m8.php">Search Asian Movies</a></li>
              <li class="nav-header">TV Online <font color="red">New</font></li>
              <li class="active"><a href="tvlist.php">List Channel</a></li>
              <li><a href="tvlist2.php">List Channel (Private 1)</a></li>
              <li><a href="tvlist3.php">List Channel (Private 2)</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<div class="span9">
          <div class="alert alert-warning" id="load">
  <p><img src='img/20-0.gif' border='0'>  <strong>หน้านี้จะใช้เวลาโหลดสักครู่นะครับ โปรดรอจนกว่าหน้านี้จะโหลดเสร็จ</strong></p>
</div>
           <div class="text-center"><h3>TV Online List!</h3></div>
           <div id="warning" style="text-align:center;background-color:red;color:white;font-weight:bold;font-size:120%;padding:5px;">Private TV List <a href="tvlist2.php">Click Here</a></div>

            <hr>
            <table class="table table-bordered">
            <tr class="success"><td><strong>ID</strong></td><td><strong>ชื่อสถานนี</strong></td><td><strong>ผู้ให้บริการ</strong></td><td><strong>สถานะ</strong></td><td><strong>รับชม</strong></td></tr>
<?php 
include("db_connect.php");
mysql_connect($host,$user,$pass)or die(mysql_error());
mysql_select_db($db);
mysql_query("set NAMES utf8");

$sql = "SELECT * from anypic2u_tv WHERE id";
$sql_query = mysql_query($sql);
$sql_num_rows = mysql_num_rows($sql_query);

if (!empty($_SESSION['ses_fbid'])) {
  $fb_id = $_SESSION['ses_fbid'];
  $sql_checkuser = "SELECT donate from anypic2u_user WHERE fbid='$fb_id'";
  $sql_queryuser = mysql_query($sql_checkuser);
  $donate = mysql_result($sql_queryuser, 0,'donate');
}

    
$i = 0;
  while ($i < $sql_num_rows) {
    $fetcharr = mysql_fetch_array($sql_query);
    $id = $fetcharr['id'];
    $name = $fetcharr['name'];
    $url = $fetcharr['url'];
    $vip = $fetcharr['vip'];
    $provide = $fetcharr['provide'];

    if ($vip == 0){
      $vip_n = "สมาชิกปกติ";
    }else if ($vip == 1){
      $vip_n = "<font color='red'>สมาชิกบริจาคเท่านั้น</font>";
    }else if ($vip == 2){
      $vip_n = "<i><font color='red'>ยังไม่เปิดให้บริการ</font></i>";
    }
 echo '<tr class="warning"><td>'.$i.'</td><td>'.$name.'</td><td>'.$provide.'</td><td>'.$vip_n.'</td>';
if (!empty($_SESSION['ses_fbid'])) {
    if ($vip == 1 && $donate == 0){
        echo ' <td><a href="javascript:window.alert(\'ช่องนี้ เฉพาะผู้บริจาคเท่านั้น\')" class="btn btn-inverse">ดูช่องนี้</a>';
    }else if ($vip == 1 && $donate == 1) {
      echo ' <td><a href="#" onclick="MM_openBrWindow(\'http://1222pic.hopto.org/tvplayer.php?id='.$id.'\',\'\',\'status=yes,width=700,height=550\')" class="btn btn-inverse">ดูช่องนี้</a>';       
    }else if ($vip == 1 && $donate == 2) {
      echo ' <td><a href="#" onclick="MM_openBrWindow(\'http://1222pic.hopto.org/tvplayer.php?id='.$id.'\',\'\',\'status=yes,width=700,height=550\')" class="btn btn-inverse">ดูช่องนี้</a>';       
    }else if ($vip == 2){
      echo ' <td><a href="javascript:window.alert(\'ยังไม่เปิดให้บริการ\')" class="btn btn-inverse">ดูช่องนี้</a>';
    }else{
      echo ' <td><a href="#" onclick="MM_openBrWindow(\'http://1222pic.hopto.org/tvplayer.php?id='.$id.'\',\'\',\'status=yes,width=700,height=550\')" class="btn btn-inverse">ดูช่องนี้</a>';       
    }
        } else {
      echo ' <td><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\')" class="btn btn-inverse">ดูช่องนี้</a>';
    } 
    $i++;
}

    ?> 
</table>

 </div> <!-- /container -->
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
