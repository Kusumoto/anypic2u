<?php
session_start();
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

include('db_connect.php');
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
if (empty($_POST)) {
	exit('Error Method');
}

$quickpasscode = $_POST['passcode'];
$quickpasscode = addslashes($quickpasscode);

if (empty($quickpasscode)) {
	exit('Code not empty');
}

$today_date=date("Y-m-d");
      $today_time=date("G:i:s");
      $usergent=$_SERVER["HTTP_USER_AGENT"];

  if (getenv(HTTP_X_FORWARDED_FOR))
        $ip=getenv(HTTP_X_FORWARDED_FOR);
    else
        $ip=getenv(REMOTE_ADDR);

//MySQLi Connect Link
$link = mysqli_connect($host,$user,$pass,$db);

if ($link->connect_error) {
	die("Error : ".mysqli_connect_errno());
}
$link->set_charset("utf8");
//Query Data
$quicklogin = $link->query("SELECT * from anypic2u_user WHERE passcode='$quickpasscode'");
$login_num_rows = $quicklogin->num_rows;

if ($login_num_rows == 0) {
	exit('Passcode Not Correct!');
}

if ($row = $quicklogin->fetch_array(MYSQLI_BOTH)) {
	$quickcode = $row['passcode'];
	$fbid = $row['fbid'];
}

if ($quickcode != $quickpasscode) {
	exit('Passcode Not Correct!');
}else{
	$_SESSION['ses_fbid'] = $fbid;
	$logsave = $link->query("INSERT into anypic2u_loginlog (`fbid`,`date`,`time`,`ugent`,`action`,`ip`) values ('{$fbid}','{$today_date}','{$today_time}','{$usergent}','LOGEDIN(CODE)','{$ip}')");
	echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
} else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo "Error reCAPTCHA!";

?>
