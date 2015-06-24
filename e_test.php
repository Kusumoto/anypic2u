<?php    
        session_start();    
        include('db_connect.php');
        $fbid = $_SESSION['ses_fbid'];
        
        if (empty($fbid)) {
            echo 'ERROR|YOURNOTLOGIN!';
            exit();
        }

        $link = new mysqli($host,$user,$pass,$db);
        if ($link->connect_error) {
            die("Error : ".mysqli_connect_errno());
        }

        $link->set_charset("utf8");
        $queryuser_coin = $link->query("SELECT * from anypic2u_coin WHERE fbid='$fbid'");
        $num_rows_coin = $queryuser_coin->num_rows;
       // $coin = $request['cardcard_amount'];
        $coin = $_GET['coin'];
        $coin_temp = ($coin*0.12);
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
        ?>