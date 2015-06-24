<?php session_start();
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

 <script>

$(document).ready(function(){
    $("#form").on('submit',function(event){
    event.preventDefault();

        $.ajax({
        type: "POST",
        url: "savedonate.php",
        data: $("#form").serialize(),
        }).done(function(msg) {{

            $("#alert").html(msg);
        }
        });
    });
});

</script>

   <script>

window.onload = function() {
   document.getElementById("load").style.display = "none";
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
              <li><a href="notifi.php"><i class="icon-bullhorn"></i> Notification</a></li>
              <li class="active"><a href="donate.php"><i class="icon-info-sign"></i> Donate <img src="img/donate_notif.png" \></a></li>
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
      <h1>Donation</h1>
      <small>เนื่องจากการขับเคลื่อนเว็บไซต์นั้น จำเป็นต้องมีค่าใช้จ่ายในการดูและรักษาระบบ ค่าเช่า Server และค่าอัพเกรดระบบใหม่ๆ ให้ทันสมัยและรองรับบริการมากขึ้น การบริจาคด้วยเงินของคุณจะทำให้เว็บไซต์ดำเนินต่อไปอย่างราบรื่น และมีสิ่งใหม่ๆ มาให้ลองเล่นกันเสมอ</small>
      </br>
      <h3>บริจาคแล้วได้อะไร?</h3>
      <small>ท่านที่บริจาค มากกว่า 300 บาท จะได้รับ "ดาว" หลังชื่อ <img src="img/star.png" \> เพื่อเป็นการขอบคุณ แสดงให้เห็นว่าท่านเป็นผู้มีอุปการคุณกับเว็บไซตื และจะได้รับสิทธิ์ในการทดลองระบบใหม่ๆก่อนใคร และอนาคตอาจจะมีพิเศษสำหรับผู้บริจาคก็เป็นได้</small> 
      <h3>ช่องทางในการบริจาค</h3>
      <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ธนาคาร</th>
                <th>รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
      <h3>แจ้งบริจาค</h3>
    <form class="form-horizontal" id="form" method="GET" action="savedonate.php">
          <div class="control-group">
              <label class="control-label">จำนวนเงิน</label>
                  <div class="controls">
                      <input type="text" name="donate_total" class="input-mini" >
           </div>
         </div>
    <div class="control-group">
            <label class="control-label">วันเวลาโอน</label>
                <div class="controls">
                  <input class="hasDatepicker" name="date" type="text"><span class="help-inline">กรอกวันเวลาให้ละเอียดครบถ้วน เพื่อใช้ในการตรวจสอบ</span>
            </div>
    </div>
    <div class="control-group">
      <label class="control-label">ธนาคารที่โอน</label>
       <div class="controls">
         <select class="span2" name="bank">
          <option>ธนาคารไทยพาณิชย์</option>
          <option>ธนาคารกสิกรไทย</option>
          <option>ธนาคารกรุงเทพฯ</option>
        </select>
        </div>
   </div>
           <div class="controls">
    <button type="submit" class="btn btn-primary" data-loading-text="Loading...">แจ้งโอนเงิน</button>
    </div>
    </form>

        <div class="alert alert-error" id="alert">
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