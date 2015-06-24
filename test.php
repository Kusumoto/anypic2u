<?php
include("obj_func.php");
$xmlUrl = "http://xemphimcucdinh.com/rest/tiviviethdv2/tiviviethdv3/getallofchannels/channel";

$opts = array('http' =>
    array(
        'method'  => 'GET',
        'header'  => 'User-Agent: FPT%20Play/0.11 CFNetwork/609.1.4 Darwin/13.0.0'.
                     'Content-type: application/x-www-form-urlencoded'
        //'proxy' => 'tcp://221.176.14.72:80',
    )
);

$context  = stream_context_create($opts);
$xmlStr = file_get_contents($xmlUrl, false, $context);
$obj = json_decode($xmlStr);
$arrXml = objectsIntoArray($obj);

//print_r(json_decode($arrXml['Channels'][10]));

print_r($obj);