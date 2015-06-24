<?php
session_start();
require_once('AES.php');

// กำหนด API Passkey
define('API_PASSKEY', 'Anypic2uKuZap');

if(isset($_GET['request']))
{
    $aes = new Crypt_AES();
    $aes->setKey(API_PASSKEY);
    $_GET['request'] = base64_decode(strtr($_GET['request'], '-_,', '+/='));
    $_GET['request'] = $aes->decrypt($_GET['request']);

    if($_GET['request'] != false)
    {
        parse_str($_GET['request'],$request);
        $request['Ref1'] = base64_decode($request['Ref1']);
        $request['cardcard_amount'] = base64_decode($request['cardcard_amount']);

        // เริ่มต้นการทำงานของระบบของท่าน
        include('db_connect.php');
        $fbid = $request['Ref1'];

        //if (empty($fbid)) {
        //    echo 'ERROR|YOURNOTLOGIN!';
        //    exit();
        //}

        $link = new mysqli($host,$user,$pass,$db);
        if ($link->connect_error) {
            die("Error : ".mysqli_connect_errno());
        }

        $link->set_charset("utf8");
        $queryuser_coin = $link->query("SELECT * from anypic2u_coin WHERE fbid='$fbid'");
        $num_rows_coin = $queryuser_coin->num_rows;
        $coin = $request['cardcard_amount'];
        $coin_temp = ($coin*0.15);
        $coin = ($coin-$coin_temp);
        if ($num_rows_coin == 0) {
            $link->query("INSERT into anypic2u_coin (fbid,coin) values ('{$fbid}','{$coin}')");
        }else{

            $i=0;
            while($row = $queryuser_coin->fetch_array(MYSQLI_BOTH)) {
                $coin2 = $row['coin'];
                $i++;
            }

            $coin = ($coin+$coin2);

            $link->query("UPDATE anypic2u_coin Set coin='{$coin}' WHERE fbid='$fbid'");
        }
        // สิ้นสุดการทำงานของระบบของท่าน

        echo 'SUCCEED';
    }
    else
    {
        echo 'ERROR|INVALID_PASSKEY';
    }
}
else
{
    echo 'ERROR|ACCESS_DENIED';
}

?>