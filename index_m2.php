<?php
include("obj_func.php");
      if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}

    @$page = $_GET['page'];
    if (empty($page))
      $page = 20;
    $page2 = $page+20;


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
      $vip = mysql_result($sql_queryuser, 0,'donate');


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
              <li class="nav-header">TVTH <font color="red">New</font></li>
              <li><a href="tvth.php">TVTH</a></li>
              <li class="nav-header">International Movies</li>
              <li><a href="index_m1.php">Movies Update!</a></li>
              <li><a href="search_m1.php">Search Movies!</a></li>
              <li class="nav-header">Anime</li>
              <li class="active"><a href="index_m2.php">Anime Update</a></li>
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
              <li class="nav-header">Japan Series</li>
              <li><a href="index_m7.php">Japan Series Update</a></li>
              <li><a href="allmovies_m7.php">Browse Japan Series</a></li>
              <li><a href="search_m7.php">Search Japan Series</a></li>
              <li class="nav-header">Asian Movies</li>
              <li><a href="index_m8.php">Browse Asian Movies</a></li>
              <li><a href="search_m8.php">Search Asian Movies</a></li>
              <li class="nav-header">SitCom Movie <font color="red">New</font></li>
              <li><a href="index_m9.php">SitCom Update</a></li>
              <li><a href="allmovies_m9.php">Browse SitCom</a></li>
              <li><a href="search_m9.php">Search SitCom</a></li>
              <li class="nav-header">Korea Variety <font color="red">New</font></li>
              <li><a href="index_m10.php">Korea Variety Update</a></li>
              <li><a href="allmovies_m10.php">Browse Korea Variety</a></li>
              <li><a href="search_m10.php">Search Korea Variety</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<div class="span9">
          <div class="alert alert-warning" id="load">
  <p><img src='img/20-0.gif' border='0'>  <strong>หน้านี้จะใช้เวลาโหลดสักครู่นะครับ โปรดรอจนกว่าหน้านี้จะโหลดเสร็จ</strong></p>
</div>
           <div class="text-center"><h3>Anime Update!</h3></div>
           <div class="text-right">
               <form class="form-search" action="search_m2.php" method="POST">
                 <input type="text" class="input-medium search-query" placeholder="ชื่ออนิเมะที่ต้องการหา" name="keyword">
                 <button type="submit" class="btn">Search</button>
              </form>
            </div>
            <hr>
            <table class="table table-bordered">
            <tr class="success"><td><strong>PIC</strong></td><td><strong>Title</strong></td><td><strong>Part</strong></td><td><strong>Status</strong></td><td><strong>Updated</strong></td><td><strong>Action</strong></td></tr>
<?php 

    $xmlUrl = "http://allnewservice.serviceseries.com/newversion/animefcService.ashx?";   
    $postdata = http_build_query(
    array(
        'type' => 'serienews',
        'pid' => 0,
        'ps' => $page
    )
);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => //'Content-type: application/x-www-form-urlencoded 
                      'User-Agent: com.comicfcapp.moviefciphone/3.0 (unknown, iPhone OS 6.1.3, iPod touch, Scale/2.000000)',
       // 'proxy' => 'tcp://109.205.117.130:8080',
        'content' => $postdata        
    )
);
$context  = stream_context_create($opts);   
    $cache_file = "cache/m2_index_u_$page.cache";

    if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 60 * 5 ))) {

   $xmlStr = file_get_contents($cache_file);
} else {

   $xmlStr = file_get_contents($xmlUrl, false, $context);
   file_put_contents($cache_file, $xmlStr, LOCK_EX);
}   
    if ($xmlStr == false) {
      echo '<center>ขณะนี้มีผู้ใช้งานระบบมากเกินกว่ากำหนด กรุณาลองใหม่ในภายหลัง</center>';
    } else {
   
     $obj = json_decode($xmlStr);
    $arrXml = objectsIntoArray($obj);
    
$i = 0;
  while ($i < $page) {
    $pic = $arrXml[$i]['PictureName'];
    if ($arrXml[$i]['Status'] == 0) {
  $statusmsg = "Coming Soon.";
}else if ($arrXml[$i]['Status'] == 1) {
  $statusmsg = "On Air.";
}else if ($arrXml[$i]['Status'] == 2) {
  $statusmsg = "Complete";
}

 echo '<tr class="warning"><td><img src="getpostermv_m2.php?id='.$pic.'" width="50" height="50""</td><td>'.$arrXml[$i]['SerieTitle'].'</td><td>'.$arrXml[$i]['PartName'].'</td><td>'.$statusmsg.'</td><td>'.$arrXml[$i]['DateUploaded'].'</td>';
if ($vip == 1 || $vip == 2) {
    echo ' <td><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&pic=getpostermv_m2.php?id='.$pic.'&title='.$arrXml[$i]['SerieTitle'].'&part='.$arrXml[$i]['PartName'].'\',\'\',\'status=yes,width=700,height=500\')" class="btn btn-inverse">ดูตอนนี้</a> <a href="getlink.php?type=m2&id='.$arrXml[$i]['SerieID'].'" class="btn btn-inverse" target="_BLANK">ดูตอนทั้งหมด</a>';
    } else {
      echo ' <td><a href="javascript:window.alert(\'กรุณาชำระเงินที่หน้า Donate ครับ\')" class="btn btn-inverse">ดูตอนนี้</a> <a href="getlink.php?type=m2&id='.$arrXml[$i]['SerieID'].'" class="btn btn-inverse" target="_BLANK">ดูตอนทั้งหมด</a>';
    } 
    $i++;
}
}
    ?> 
</table>
<p align="center"><a href="index_m2.php?page=<?=$page2;?>" class="btn btn-primary" data-loading-text="loading..." type="button"> Load More... </button></a>
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



