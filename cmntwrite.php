<?php

$hostname = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbName = "forumdb";
$id_post = $_GET['id'];
$dbTable = "cmnt_$id_post";

$link = mysql_pconnect($hostname, $username, $password) 
	or die (mysql_error());

mysql_select_db ($dbName) 
	or die (mysql_error());

$text = $_POST['cmnt_text'];
$usr = $_POST['cmnt_usr'];
$query = "insert into $dbTable values('', '$text', '$usr')";
mysql_query($query)
	or die (mysql_error()); 

mysql_close($link);

header("location: postview.php?id=$id_post");

?>