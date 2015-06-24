<?php
if (empty($_GET['id']))
	exit('EXIT');
$id = $_GET['id'];

header("Location: http://www.series8-admin.com/poster/$id");
?>