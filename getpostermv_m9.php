<?php
if (empty($_GET['id']))
	exit('EXIT');
$id = $_GET['id'];

header("Location: http://www.sitcomfc-admin.com//thum/$id");
?>