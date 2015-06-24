<?php


   $xmlUrl = "http://allnewservice.serviceseries.com/newversion/asianfcService.ashx?"; 
    $postdata = http_build_query(
    array(
        'type' => 'serielink',
        'id' => 1561,
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
$context  = stream_context_create($opts);
$xmlStr = file_get_contents($xmlUrl, false, $context);
$obj = json_decode($xmlStr);

print_r($obj);