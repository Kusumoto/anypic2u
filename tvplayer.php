<?php session_start(); 
include("db_connect.php");
if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}
mysql_connect($host,$user,$pass)or die(mysql_error());
mysql_select_db($db);
mysql_query("set NAMES utf8");

$id = $_GET['id'];

$sql = "SELECT * from anypic2u_tv WHERE id='$id'";
$sql_query = mysql_query($sql);
$sql_num_rows = mysql_num_rows($sql_query);
$name = mysql_result($sql_query, 0,'name');
$url = mysql_result($sql_query, 0,'url');
$vip = mysql_result($sql_query, 0,'vip');

if (!empty($_SESSION['ses_fbid'])) {
  $fb_id = $_SESSION['ses_fbid'];
  $sql_checkuser = "SELECT donate from anypic2u_user WHERE fbid='$fb_id'";
  $sql_queryuser = mysql_query($sql_checkuser);
  $donate = mysql_result($sql_queryuser, 0,'donate');
}


?>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
<style type="text/css">
	
	body{
	font-size:13px;
	font-family:Tahoma, Geneva, sans-serif;
	color:#282828;
	background: #E5E3E3;
	
}
</style>
<script type="text/javascript" src="http://www.longtailvideo.com/jwplayer/jwplayer.js"></script>
<script type="text/javascript" src="http://www.longtailvideo.com/jwplayer/key.js"></script>
<script>
var message="Copyright by Anypic2u !";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")
</script>
<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15_gif.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="" ><script  type="text/javascript" >
try {Histats.startgif(1,2414640,4,10048,"");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" alt="" target="_blank" ><div id="histatsC"><img border="0" src="http://s4is.histats.com/stats/i/2414640.gif?2414640&103"></div></a>
</noscript>
<!-- Histats.com  END  -->
<!-- Histats.com  END  -->
<script type="text/javascript" language="javascript1.1" src="http://tracker.stats.in.th/tracker.php?sid=50590"></script><noscript><a target="_blank" href="http://www.stats.in.th/">www.Stats.in.th</a></noscript>


<center><a href="javascript:window.location.reload()">หากไม่สามารถเล่นวิดีโอได้ ให้ทำการคลิกที่นี้เพื่อขอสัญญาณใหม่</a></center>

<?php


if (!empty($_SESSION['ses_fbid'])) {
	 if ($vip == 1 && $donate == 0){
	 	echo "<h1>ช่องนี้สำหรับผู้บริจาคเท่านั้น</h1>";
	 }else if ($vip == 1 && $donate == 1) {
?>
<center><h2><?=$name;?></h2></center>

 <div id='player_1' class="video_holder">
 </div>
 <script type='text/javascript'>
  jwplayer('player_1').setup({
   file: "<?=$url;?>",
   width: "700",
   height: "380",
   autostart: "true",
   });
 </script>
 
<?
}else if ($vip == 1 && $donate == 2) {
?>
<center><h2><?=$name;?></h2></center>

 <div id='player_1' class="video_holder">
 </div>
 <script type='text/javascript'>
  jwplayer('player_1').setup({
   file: "<?=$url;?>",
   width: "700",
   height: "380",
   autostart: "true",
   });
 </script>
 
<?
}else if($vip == 2){
  echo "<h1>ช่องยังไม่เปิดให้บริการ</h1>";
}else{
?>
<center><h2><?=$name;?></h2></center>
 <div id='player_1' class="video_holder">
 </div>
 <script type='text/javascript'>
  jwplayer('player_1').setup({
   file: "<?=$url;?>",
   width: "700",
   height: "380",
   autostart: "true",
   });
 </script>
</br>
</br>
<?php
}

}else{
	echo "<center><h2><font color='red'>กรุณาเข้าสู่ระบบด้วย Facebook</font></h2></center>";
}
//echo '<iframe src="http://cdn.anypic2u.com/mini.php?url='.$temp2[20].'" name="left" align="left" width="680" height="550" scrolling="no"></iframe>';
?>