<?php
include("obj_func.php");
    if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}

 //error_reporting(E_ALL);
 //ini_set("display_errors", 1);

include("func_bookmark.php");

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


if (empty($_GET['id']))
      exit('Error');
    $id = $_GET['id'];

if (empty($_GET['type']))
      exit('Error');
    $type = $_GET['type'];

if ($type == "m1") {
    $xmlUrl = "http://allnewservice.serviceseries.com/newversion/moviefcService.ashx?"; 
    $postdata = http_build_query(
    array(
        'type' => 'serielink',
        'id' => $id,
        'ps' => 100
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'User-Agent: com.comicfcapp.moviefciphone/3.0 (unknown, iPhone OS 6.1.3, iPod touch, Scale/2.000000)'.
                     'Content-type: application/x-www-form-urlencoded',
      //  'proxy' => 'tcp://221.176.14.72:80',
        'content' => $postdata
    )
);

}else if($type == "m2"){
  $xmlUrl = "http://allnewservice.serviceseries.com/newversion/animefcService.ashx?";   
    $postdata = http_build_query(
    array(
        'type' => 'serielink',
        'id' => $id,
        'ps' => 500
     
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

}else if($type == "m3"){
  $xmlUrl = "http://allnewservice.serviceseries.com/newversion/series6Service.ashx?";   
    $postdata = http_build_query(
    array(
         'type' => 'getlink',
        'id' => $id,
        'ps' => 500
     
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
}else if($type == "m4"){
  $xmlUrl = "http://allnewservice.serviceseries.com//newversion/Series9Service.ashx?"; 
    $postdata = http_build_query(
    array(
        'type' => 'serielink',
        'id' => $id,
        'ps' => 100
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'User-Agent: com.nsmsoftservice.series9iphone/3.0 (unknown, iPhone OS 6.1.3, iPod touch, Scale/2.000000)'.
                     'Content-type: application/x-www-form-urlencoded',
      //  'proxy' => 'tcp://221.176.14.72:80',
        'content' => $postdata

    )
);

}else if($type == "m5"){
  $xmlUrl = "http://allnewservice.serviceseries.com//newversion/Series8Service.ashx?"; 
    $postdata = http_build_query(
    array(
        'type' => 'getlink',
        'id' => $id,
        'ps' => 100
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'User-Agent: com.nsmsoftservice.series8iphone/3.1 (unknown, iPhone OS 6.1.3, iPod touch, Scale/2.000000)'.
                     'Content-type: application/x-www-form-urlencoded',
      //  'proxy' => 'tcp://221.176.14.72:80',
        'content' => $postdata

    )
);

}else if($type == "m6"){
  $xmlUrl = "http://cartoonlive.serviceseries.com/CartoonHandler.ashx?type=serielink&ps=100&id=$id";
}else if($type == "m7"){
  $xmlUrl = "http://allnewservice.serviceseries.com/newversion/series7Service.ashx?";   
    $postdata = http_build_query(
    array(
         'type' => 'getlink',
        'id' => $id,
        'ps' => 500
     
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
}else if($type == "m8"){
  $xmlUrl = "http://allnewservice.serviceseries.com/newversion/asianfcService.ashx?"; 
    $postdata = http_build_query(
    array(
        'type' => 'serielink',
        'id' => $id,
        'ps' => 100
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'User-Agent: com.comicfcapp.asianfciphone/3.0 (unknown, iPhone OS 6.1.3, iPod touch, Scale/2.000000)'.
                     'Content-type: application/x-www-form-urlencoded',
      //  'proxy' => 'tcp://221.176.14.72:80',
        'content' => $postdata
    )
);
}else if($type == "m9"){
  $xmlUrl = "http://allnewservice.serviceseries.com//newversion/SitcomFcService.ashx??"; 

  $postdata = http_build_query(
    array(
        'type' => 'getlink',
        'id' => $id,
        'ps' => 100
     
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'User-Agent: com.nsmsoftservice.SitcomFciphone/3.1 (unknown, iPhone OS 6.1.3, iPod touch, Scale/2.000000)'.
                     'Content-type: application/x-www-form-urlencoded',
        //'proxy' => 'tcp://221.176.14.72:80',
        'content' => $postdata
    )
);

}else if ($type == "m10") {
  $xmlUrl = "http://allnewservice.serviceseries.com//newversion/KvarietyService.ashx?"; 

  $postdata = http_build_query(
    array(
        'type' => 'getlink',
        'id' => $id,
        'ps' => 100
     
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'User-Agent: com.nsmsoftservice.SitcomFciphone/3.1 (unknown, iPhone OS 6.1.3, iPod touch, Scale/2.000000)'.
                     'Content-type: application/x-www-form-urlencoded',
        //'proxy' => 'tcp://221.176.14.72:80',
        'content' => $postdata
    )
);
}

  if ($type == "m1" || $type == "m2"  || $type == "m3" || $type == "m4" || $type == "m5" || $type == "m8" || $type == "m7" || $type == "m9" || $type == "m10") {
    $context  = stream_context_create($opts);
    $cache_file = "cache/".$type."_$id.linkcache";
      if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 60 * 5 ))) {
          $xmlStr = file_get_contents($cache_file);
      } else {
       $xmlStr = file_get_contents($xmlUrl, false, $context);
       file_put_contents($cache_file, $xmlStr, LOCK_EX);
    }
   $obj = json_decode($xmlStr); 
   $arrXml = objectsIntoArray($obj);
  }else{
    $cache_file = "cache/".$type."_$id.linkcache";
      if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 60 * 5 ))) {
        $xmlStr = file_get_contents($cache_file);
    } else {
      $xmlStr = file_get_contents($xmlUrl);
      file_put_contents($cache_file, $xmlStr, LOCK_EX);
    }
    $xmlObj = simplexml_load_string($xmlStr);  
    $arrXml = objectsIntoArray($xmlObj);
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?php
if ($type == "m1" || $type == "m2"  || $type == "m3" || $type == "m4" || $type == "m5" ||  $type == "m7" || $type == "m8" || $type == "m9" || $type == "m10") { ?>
<title>Anypic2u - <?=$arrXml[0]['SerieName'];?></title>
<?php } else if (!empty($arrXml['item'][0]['SerieName'])) { ?>
<title>Anypic2u - <?=$arrXml['item'][0]['SerieName'];?></title>>
<?php }else{ ?>
<title>Anypic2u - <?=$arrXml['item']['SerieName'];?></title>
<?php } ?>
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
      <script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

window.onload = function() {
   document.getElementById("load").style.display = "none";
}

function rm(type,id){
  $.get('bookmarking_test.php',{action:'remove',type:type,id:id},function(data){$('#book_'+type).html(data);});
}
function add(type,id,name){
  $.get('bookmarking_test.php',{action:'add',type:type,id:id,name:name},function(data){$('#book_'+type).html(data);});
}

</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=174393336074024";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
              <li class="active"><a href="#"><i class="icon-play"></i> Player</a></li>
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
  <div class="alert alert-warning" id="load">
  <p><img src='img/20-0.gif' border='0'>  <strong>หน้านี้จะใช้เวลาโหลดสักครู่นะครับ โปรดรอจนกว่าหน้านี้จะโหลดเสร็จ</strong></p>
</div>
<?php
if ($type == "m1" || $type == "m2"  || $type == "m3" || $type == "m4" || $type == "m5" || $type == "m8" || $type == "m7" || $type == "m9" || $type == "m10") { ?>
<center><h1><?=$arrXml[0]['SerieName'];?></h1></center>
<?php } else if (!empty($arrXml['item'][0]['SerieName'])) { ?>
<center><h1><?=$arrXml['item'][0]['SerieName'];?></h1></center>
<?php }else{ ?>
<center><h1><?=$arrXml['item']['SerieName'];?></h1></center>
<?php } ?>
<center><h4>กรุณาเลือกเสียงหรือตอนที่ต้องการรับชม</h4></center>
<center>
<?php 
if ($vip == 1 || $vip == 2 ){

if ($type != "m1" || $type != "m8") { 
      if ($type == "m2"  || $type == "m3" || $type == "m4" || $type == "m5" || $type == "m9" || $type == "m10") { 
          if (checkbookmark($_SESSION['ses_fbid'],$type,$id) == true) {?>
       <a href="javascript:void()" name="book_<?=$type;?>" id="book_<?=$type;?>" class="btn btn-info" onclick="add('<?=$type;?>',<?=$id;?>,'<?=$arrXml[0]['SerieName'];?>')"><i class="icon-bookmark"></i> ติดตามเรื่องนี้</a>
  <?php }else{ ?>
      <a href="javascript:void()" name="book_<?=$type;?>" id="book_<?=$type;?>" class="btn btn-info" onclick="rm('<?=$type;?>',<?=$id;?>)"><i class="icon-bookmark"></i> เลิกติดตามเรื่องนี้</a> 
    <?php } } else if (!empty($arrXml['item'][0]['SerieName'])) { 
        if (checkbookmark($_SESSION['ses_fbid'],$type,$id) == true) { ?>
        <a href="javascript:void()" name="book_<?=$type;?>" id="book_<?=$type;?>" class="btn btn-info" onclick="add('<?=$type;?>',<?=$id;?>,'<?=$arrXml['item'][0]['SerieName'];?>')"><i class="icon-bookmark"></i> ติดตามเรื่องนี้</a> 
   <?php } else { ?>
        <a href="javascript:void()" name="book_<?=$type;?>" id="book_<?=$type;?>" class="btn btn-info" onclick="rm('<?=$type;?>',<?=$id;?>)"><i class="icon-bookmark"></i> เลิกติดตามเรื่องนี้</a> 
  <?php } }else{
    if (checkbookmark($_SESSION['ses_fbid'],$type,$id) == true) { ?>
    <a href="javascript:void()" name="book_<?=$type;?>" id="book_<?=$type;?>" class="btn btn-info" onclick="add('<?=$type;?>',<?=$id;?>,'<?=$arrXml['item'][0]['SerieName'];?>')"><i class="icon-bookmark"></i> ติดตามเรื่องนี้</a> 
   <?php } else { ?>
        <a href="javascript:void()" name="book_<?=$type;?>" id="book_<?=$type;?>" class="btn btn-info" onclick="rm('<?=$type;?>',<?=$id;?>)"><i class="icon-bookmark"></i> เลิกติดตามเรื่องนี้</a> 
    <?php }
   }
  }
  ?>
</center>
<hr>
 <div align="center"><a href="https://twitter.com/share" class="twitter-share-button" data-related="jasoncosta" data-lang="en" data-count=" horizontal">Tweet</a>
<div class="fb-like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div></div>
<hr>
<?php
if ($type == "m1") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary"><img src="img/'.$arrXml[$i]['PartName'].'.png"> '.$arrXml[$i]['SerieName'].' เสียง '.$arrXml[$i]['PartName'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartName'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary"><img src="img/'.$arrXml[$i]['PartName'].'.png"> '.$arrXml[$i]['SerieName'].' เสียง '.$arrXml[$i]['PartName'].'</a></center> </br>';
  }
}
    $i++;
  }
}else if ($type == "m2") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }
}
    $i++;
  }
}else if ($type == "m3") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }
}
    $i++;
}
}else if ($type == "m4") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }
}
    $i++;
  }
}else if ($type == "m5") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary"><img src="img/8.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary"><img src="img/8.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }
}
    $i++;
  }
}else if ($type == "m9") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary">'.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary">'.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }
}
    $i++;
  }
}else if ($type == "m8") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary"><img src="img/Asian.png"> '.$arrXml[$i]['SerieName'].' เสียง '.$arrXml[$i]['PartName'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartName'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary"><img src="img/Asian.png"> '.$arrXml[$i]['SerieName'].' เสียง '.$arrXml[$i]['PartName'].'</a></center> </br>';
  }
}
    $i++;
  }
}else if ($type == "m7") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }
}
    $i++;
  }
}else if ($type == "m10") {
$i = 0;
while($i < 100){
  if (!empty($arrXml[$i]['SerieName'])) {
  if (empty($_SESSION['ses_fbid'])) {
    echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }else{
    $arrXml[$i]['SerieName'] = str_replace("'", "\'", $arrXml[$i]['SerieName']);
    echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml[$i]['Link']))).'&title='.$arrXml[$i]['SerieName'].'&part='.$arrXml[$i]['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary"><img src="img/9.png"> '.$arrXml[$i]['SerieName'].' ตอน '.$arrXml[$i]['PartNumber'].'</a></center> </br>';
  }
}
    $i++;
  }
}else{
  if (empty($arrXml['item'][0]['SerieName'])) {
    if (empty($_SESSION['ses_fbid'])) {
      echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary">'.$arrXml['item']['SerieName'].' ตอน '.$arrXml['item']['PartNumber'].'</a></center> </br>';
}else{
      echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml['item']['Link']))).'&title='.$arrXml['item']['SerieName'].'&part='.$arrXml['item']['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary">'.$arrXml['item']['SerieName'].' ตอน '.$arrXml['item']['PartNumber'].'</a></center> </br>';
}
}else{
    $i = 0;
    while($i < 300) {
      if (!empty($arrXml['item'][$i]['SerieName'])) {
        if (empty($_SESSION['ses_fbid'])) {
         echo '<center><a href="javascript:window.alert(\'กรุณาเข้าสู่ระบบด้วย Facebook\') " class="btn btn-primary">'.$arrXml['item'][$i]['SerieName'].' ตอน '.$arrXml['item'][$i]['PartNumber'].'</a></center> </br>';
      }else{
        echo '<center><a href="#" onclick="MM_openBrWindow(\'http://anypicplayer.eu5.org/mini.php?url='.base64_encode(bin2hex(base64_encode($arrXml['item'][$i]['Link']))).'&title='.$arrXml['item'][$i]['SerieName'].'&part='.$arrXml['item'][$i]['PartNumber'].'\',\'\',\'status=yes,width=750,height=500\')" class="btn btn-primary">'.$arrXml['item'][$i]['SerieName'].' ตอน '.$arrXml['item'][$i]['PartNumber'].'</a></center> </br>';
      }
  }
$i++;
  }
}
}
?>
<p><i><?php
    $last_mod = filemtime($cache_file);
print("Cache Last Update on ");
print(date("m/j/Y H:i:s", $last_mod));
?></i></p>
<?php }else{
  echo "<center><h3>คุณไม่มีสิทธิ์เข้าใช้งาน โปรดชำระเงิน <a href='donate.php'>คลิก</a></h3></center>";
}
?>
<hr>
<center><div class="fb-comments" data-href="http://anypic2u.com/getlink.php?type=<?=$type;?>&id=<?=$id;?>" data-width="470" data-num-posts="20"></div></center>

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

