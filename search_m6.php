<?php  
    include("obj_func.php");
    include("func_bookmark.php");
  if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}



    @$page = $_GET['page'];
    @$keyword = $_REQUEST['keyword'];

    if (empty($keyword))
        header("Location: allmovies_m6.php");

    $keyword2 = preg_replace("/[\s_]/", "+", $keyword);


    if (empty($page))
      $page = 0;
    $page2 = $page+1;
    $page3 = $page-1;

     
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
           <script>
          

window.onload = function() {
   document.getElementById("load").style.display = "none";
}

function rm(type,id,p){
  $.get('bookmarking_test.php',{action:'remove',type:type,id:id},function(data){$('#book_'+type+'_'+p).html(data);});
}
function add(type,id,name,p){
  $.get('bookmarking_test.php',{action:'add',type:type,id:id,name:name},function(data){$('#book_'+type+'_'+p).html(data);});
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
              <li class="active"><a href="search_m6.php">Search Cartoon Live!</a></li>
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
            <div class="text-center"><h3>Cartoon Live Search!</h3></div>
           <div class="text-right">
                <form class="form-search" action="search_m6.php" method="POST">
                 <input type="text" class="input-medium search-query" placeholder="ชื่อการ์ตูนที่ต้องการหา" name="keyword">
                 <button type="submit" class="btn">Search</button>
              </form>
            </div>
            <hr>
          <p align="center">
          <?php
          if ($page != 0) {
             echo "<a class='btn' href='search_m6.php?page=$page3&keyword=$keyword'> <i class='icon-arrow-left'></i> Back</a> <a class='btn btn-primary' href='search_m6.php?keyword=$keyword'> <i class='icon-home'></i> Home</a> <a class='btn' href='search_m6.php?page=$page2&keyword=$keyword'>Next <i class='icon-arrow-right'></i></a>";
             }else{
             echo "<a class='btn btn-primary' href='search_m6.php?keyword=$keyword'> <i class='icon-home'></i> Home</a> <a class='btn' href='search_m6.php?page=$page2&keyword=$keyword'>Next <i class='icon-arrow-right'></i></a>";
         } 
         ?>
    </p>
         <table class="table table-bordered">
<?php
$xmlUrl = "http://cartoonlive.serviceseries.com/CartoonHandler.ashx?type=serie&pid=$page&ps=20&keyword=$keyword";    
        
    $xmlStr = file_get_contents($xmlUrl);  
    if ($xmlStr == false) {
      echo '<center>ขณะนี้มีผู้ใช้งานระบบมากเกินกว่ากำหนด กรุณาลองใหม่ในภายหลัง</center>';
    } else {
    $xmlObj = simplexml_load_string($xmlStr);
    $arrXml = objectsIntoArray($xmlObj); 
      
    
   $i = 0;
   $y = 0;
   $z = 0;
  while ($i < 3) {
     
     echo '<tr>';
     for ($y = 0;$y < 4; $y++) {
     echo '<th><a href="#" data-toggle="modal" data-target="#ViewM1_'.$z.'" ><img src="getpostermv_m6.php?id='.$arrXml['item'][$z]['picturename'].' " width="200" height="200"></br>'.$arrXml['item'][$z]['entitle'].'</a></th>';
   $z++;
   }
echo "</tr>";
 $i++;
}
?> 
    </table>
    <hr>
    <p align="center">
          <?php
          if ($page != 0) {
             echo "<a class='btn' href='search_m6.php?page=$page3&keyword=$keyword'> <i class='icon-arrow-left'></i> Back</a> <a class='btn btn-primary' href='search_m6.php?keyword=$keyword'> <i class='icon-home'></i> Home</a> <a class='btn' href='search_m6.php?page=$page2&keyword=$keyword'>Next <i class='icon-arrow-right'></i></a>";
             }else{
             echo "<a class='btn btn-primary' href='search_m6.php?keyword=$keyword'> <i class='icon-home'></i> Home</a> <a class='btn' href='search_m6.php?page=$page2&keyword=$keyword'>Next <i class='icon-arrow-right'></i></a>";
         } 
         ?>
    </p>
    </div> <!-- End M1 Tab-->

    <!-- Start Model M1 -->
<!-- Modal -->
<?php for ($p = 0;$p < 12;$p++){
  if ($arrXml['item'][$p]['status'] == 0) {
  $statusmsg = "Coming Soon.";
}else if ($arrXml['item'][$p]['status'] == 1) {
  $statusmsg = "On Air.";
}else if ($arrXml['item'][$p]['status'] == 2) {
  $statusmsg = "Complete";
}
?>
<div id="ViewM1_<?=$p;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel"><?=$arrXml['item'][$p]['entitle'];?></h3>
        </div>
      <div class="modal-body">
      <p align="center"><img src="getpostermv_m6.php?id=<?=$arrXml['item'][$p]['picturename'];?>" width="200" height="200"></p>
      <p align="left"><strong>หมวดหมู่ : </strong><?=$arrXml['item'][$p]['type'];?></p>
      <p align="left"><strong>ปี : </strong><?=$arrXml['item'][$p]['dateshowtime'];?></p>
      <p align="left"><strong>บริษัท : </strong><?=$arrXml['item'][$p]['productioncompany'];?></p>
      <p align="left"><strong>สถานะ : <?=$statusmsg;?></strong></p>
      <p align="left"><strong>เรื่องย่อ</strong></p>
        <p><?=$arrXml['item'][$p]['abstract'];?></p>
      </div>
   <div class="modal-footer">
   <?php
   $type = "m6";
   $id = $arrXml['item'][$p]['id'];
   if (checkbookmark($_SESSION['ses_fbid'],$type,$id) == true) { ?>
     <a href="javascript:void()" name="book_<?=$type;?>_<?=$p;?>" id="book_<?=$type;?>_<?=$p;?>" class="btn btn-info" onclick="add('m6',<?=$arrXml['item'][$p]['id'];?>,'<?=$arrXml['item'][$p]['entitle'];?>',<?=$p;?>)"><i class="icon-bookmark"></i> ติดตามเรื่องนี้</a> 
  <?php }else{ ?>
    <a href="javascript:void()" name="book_<?=$type;?>_<?=$p;?>" id="book_<?=$type;?>_<?=$p;?>" class="btn btn-info" onclick="rm('m6',<?=$arrXml['item'][$p]['id'];?>,<?=$p;?>)"><i class="icon-bookmark"></i> เลิกติดตามเรื่องนี้</a> 
   <?php     }  ?>
  
      <a href="getlink.php?type=m6&id=<?=$arrXml['item'][$p]['id'];?>" class="btn btn-primary" target="_BLANK"><i class="icon-film"></i> รับชมการ์ตูนเรื่องนี้</a>
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> ปิด</button>
    </div>
</div>
<?
}
?>
<!-- End Model M1 -->

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
 
    </div> <!-- /container -->

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
<?php } ?>





    <?php  
    include("obj_func.php");
    if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}
    include("head_common_m6.php");
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $start = $time;
    @$page = $_GET['page'];
    @$keyword = $_REQUEST['keyword'];

    $keyword = preg_replace("/[\s_]/", "+", $keyword);
    if (empty($page))
      $page = 0;
    $page2 = $page+1;
    $page3 = $page-1;
    echo '<title>Anypic2u (beta) - Your Movies Your Select</title>';
    ?>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=372632369514370";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
   
    <body>
    <div id='headbar'>
       <a href="index_m1.php">International Movies</a> | <a href="index_m2.php">Anime</a>  | <a href="index_m3.php">Thai Drama</a> | <a href="index_m4.php">International Series</a> | <a href="index_m5.php">Korea Series</a> | <a href="index_m6.php">Cartoon Live!</a>
    <!--<img src="images/fblogin1.png" width="150">--> <?php include('fb_user.php'); ?></div>
     <div class="fb-like-box" data-href="https://www.facebook.com/zxpic" data-width="500" data-height="210" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-show-border="false" data-header="true"></div>  
    <?php include ('notification.php'); ?>
    <div id='main'>
      <div id='mainnav'>
        <div id='searchbar'>
        <form method="post" action="search_m3.php"> 
  <input id="keyword" type="text" size="20" name="keyword"/> 
  <button type="submit" name="button" id="button" value="Submit" /><img src="images/search.png" width="15" /> Search Cartoon Live!</button>
</form> 
</div>
  <div id='pagelink'>
  <a href="index_m6.php">หน้าแรก</a> | <a href="allmovies_m6.php">เรียกดู Cartoon Live! ทั้งหมด</a> | <a href="bookmark_m6.php"> เรียกดูรายการที่ Bookmark ไว้</a> ||| 
<?php
    if ($page != 0) {
      echo '<a href="search_m6.php?page='.$page3.'&keyword='.$keyword.'">< Previous Page</a> | ';
      echo '<a href="search_m6.php?page='.$page2.'&keyword='.$keyword.'">Next Page ></a>';
    }else{
      echo '<a href="search_m6.php?page='.$page2.'&keyword='.$keyword.'">Next Page ></a></h3>';
    }
    ?>
    </div>
      </div>
      <center><h2>ผลการค้นหา คำว่า <font color="red"><?=$keyword;?></font></h2></center>
    <?php
    $xmlUrl = "http://cartoonlive.serviceseries.com/CartoonHandler.ashx?type=serie&pid=0&ps=20&keyword=$keyword";   
    $xmlStr = file_get_contents($xmlUrl);  
    if ($xmlStr == false) {
      echo '<center>ขณะนี้มีผู้ใช้งานระบบมากเกินกว่ากำหนด กรุณาลองใหม่ในภายหลัง</center>';
    } else {
    $xmlObj = simplexml_load_string($xmlStr); // สร้างเป็น xml object   
    $arrXml = objectsIntoArray($xmlObj); // แปลงค่า xml object เป็นตัวแปร array ใน php  
       
       
    // การนำค่าไปใช้  
    // print_r($arrXml); // เพื่อดูโครงสร้างของตัวแปร array  
    // ตัวอย่างข้างล่างเป็นไปตามเงื่อนไข หรือรูปแบบ xml ไฟล์นั้นๆ
    if (empty($arrXml['item'][0]))  {
       if ($arrXml['item']['status'] == 0) {
  $statusmsg = "Coming Soon.";
}else if ($arrXml['item']['status'] == 1) {
  $statusmsg = "On Air.";
}else if ($arrXml['item']['status'] == 2) {
  $statusmsg = "Complete";
}
      echo '<h1>'.$arrXml['item']['entitle'].'</h1>';  
    echo "<br />";
    $detail = $arrXml['item']['abstract'];
    echo '<div id="detail">'.iconv_substr($detail,0,800,'UTF-8').'...</div>';  
    echo '<p id="imghome"><img src="getpostermv_m6.php?id='.$arrXml['item'][$i]['picturename'].'"></p>';
    echo '<h3><font color="#8AF282">'.$statusmsg.'</font></h3>';
   // echo "<br />";  
    //echo "<br />";
    echo '<center><a href="view_m6.php?id='.$arrXml['item']['id'].'"" target="_Blank"><img src="images/watch.png" /></a></center>'; 
    echo "<br />";
    
    echo "<br />";
    echo "<hr>";
    echo "<br />";  
  }else{
   $i = 0;
  
  while ($i < 20) {

    if ($arrXml['item'][$i]['status'] == 0) {
  $statusmsg = "Coming Soon.";
}else if ($arrXml['item'][$i]['status'] == 1) {
  $statusmsg = "On Air.";
}else if ($arrXml['item'][$i]['status'] == 2) {
  $statusmsg = "Complete";
}
  	if (!empty($arrXml['item'][$i]['entitle'])) {
  //  echo $arrXml['item'][$i]['id'];  
    //echo $arrXml['item'][$i]['picturename'];
    //echo http://www.moviefc-admin.com/poster/1370725202.jpg  
    echo '<h1>'.$arrXml['item'][$i]['entitle'].'</h1>';  
    echo "<br />";
    $detail = $arrXml['item'][$i]['abstract'];
    echo '<div id="detail">'.iconv_substr($detail,0,800,'UTF-8').'...</div>';  
    echo '<p id="imghome"><img src="getpostermv_m6.php?id='.$arrXml['item'][$i]['picturename'].'"></p>';
   // echo "<br />";  
    //echo "<br />";
    echo '<center><a href="view_m6.php?id='.$arrXml['item'][$i]['id'].'"" target="_Blank"><img src="images/watch.png" /></a></center>'; 
    echo '<h3><font color="#8AF282">'.$statusmsg.'</font></h3>';
    echo "<br />";
    
    echo "<br />";
    echo "<hr>";
    echo "<br />";   
    }else{

    }
    $i++;
}
}
}
    ?> 
      <div id='footer'>
      <div id='pagelink'>
      <?php
    if ($page != 0) {
      echo '<a href="search_m6.php?page='.$page3.'&keyword='.$keyword.'">< Previous Page</a> | ';
      echo '<a href="search_m6.php?page='.$page2.'&keyword='.$keyword.'">Next Page ></a>';
    }else{
      echo '<a href="search_m6.php?page='.$page2.'&keyword='.$keyword.'">Next Page ></a></h3>';
    }
    ?></div>
    <?php $time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';
echo ' | Design by Kusumoto';
?><script type="text/javascript" language="javascript1.1" src="http://tracker.stats.in.th/tracker.php?sid=50590"></script><noscript><a target="_blank" href="http://www.stats.in.th/">www.Stats.in.th</a></noscript><!-- IPv6-test.com button BEGIN -->
<a href='http://ipv6-test.com/validate.php?url=referer'><img src='http://ipv6-test.com/button-ipv6-80x15.png' alt='ipv6 ready' title='ipv6 ready' border='0' /></a>
<!-- IPv6-test.com button END -->
      </div>
    </div>
    </body>
    </html>  
