<?php
if (empty($_GET['id']))
	exit('EXIT');
$id = $_GET['id'];

header("Location: http://www.cartoonlive-admin.com/thum/$id");
?>