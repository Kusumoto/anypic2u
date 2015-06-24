<?php
 //error_reporting(E_ALL);
 //ini_set("display_errors", 1);
//include("db_connect.php");
//mysqli_connect($host,$user,$pass,$db)or die(mysql_error());
//mysqli_select_db($db);
//mysqli_query("set NAMES utf8");

function checkbookmark($fbid,$m_id,$id) {
	include("db_connect.php");
	$link = mysqli_connect($host,$user,$pass,$db)or die(mysql_error());
	mysqli_query($link,"set NAMES utf8");
	$m_id = addslashes($m_id);
	$id = addslashes($id);
	$chkbookmark = "SELECT * from anypic2u_bookmark where fbid='$fbid' AND cat_id='$m_id' AND movie_id='$id'";
	$chkbookmark_query = mysqli_query($link,$chkbookmark);
	$chkbookmark_numrows = mysqli_num_rows($chkbookmark_query);

	if ($chkbookmark_numrows == 0){
		return true;
	}else{
		return false;
	}
}

function bookmarking($fbid,$m_id,$id,$name) {
	include("db_connect.php");
	$link = mysqli_connect($host,$user,$pass,$db)or die(mysql_error());
	mysqli_query($link,"set NAMES utf8");
	$m_id = addslashes($m_id);
	$id = addslashes($id);
	$name = addslashes($name);
	$bookmarking = "INSERT into anypic2u_bookmark (fbid,cat_id,movie_id,movie_name) values ('{$fbid}','{$m_id}','{$id}','{$name}')";
	$bookmarking_query = mysqli_query($link,$bookmarking);
	if (!isset($bookmarking_query)) {
		return false;
	}else{
		return true;
	}
}

function removebookmark($fbid,$m_id,$id) {
	include("db_connect.php");
	$link = mysqli_connect($host,$user,$pass,$db)or die(mysql_error());
	mysqli_query($link,"set NAMES utf8");
	$m_id = addslashes($m_id);
	$id = addslashes($id); 
	$removebookmark = "DELETE FROM anypic2u_bookmark where fbid='$fbid' AND cat_id='$m_id' AND movie_id='$id'";
	$removebookmark_query = mysqli_query($link,$removebookmark);
	if (!isset($removebookmark_query)) {
		return false;
	}else{
		return true;
	}
}


?>