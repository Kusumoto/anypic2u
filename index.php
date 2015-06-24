<?php
session_start();
if (!empty($_SESSION['ses_fbid'])) {
header("Location: main.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Apple</title>
<style type="text/css">
body {
	background-color: #999;
}
</style>
</head>

<body>
<p align="center"><img src="http://upload.wikimedia.org/wikipedia/commons/a/a5/Apple_gray_logo.png" width="200" height="200" />
</p>
<p>&nbsp;</p>
<div id="warning" style="text-align:center;background-color:red;color:white;font-weight:bold;font-size:120%;padding:5px;">ปิดรับสมาชิกแบบปกติแล้วนะครับ<br/><br/></div>
<p align="center">---------------</p>
<p align="center"><a href="http://anypic2u.zapto.org/fb_gateway.php"><img src="http://anypic2u.com/img/fblogin1.png"/></a></p>
<p align="center">----- OR -----</p>
<div align="center">
	<form action="quicklogin.php" method="POST">
		<label for="code">Security Pass Code : </label><input type="password" id="passcode" name="passcode">
		</br>
		<?php

require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "";
$privatekey = "";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                echo "You got it!";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
		<button>Login</button>
	</form>
</div>
<p align="center">---------------</p>
<p align="center">If you need to register to this website please e-mail to <a href="mailto:kusumoto_ton@yahoo.com">kusumoto_ton@yahoo.com</a></p>
</body>
</html>
