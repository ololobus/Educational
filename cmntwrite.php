<?php

require('database.cfg');
$id_post = $_GET['id'];

$link = mysql_pconnect($hostname, $username, $password) 
	or die (mysql_error());

mysql_select_db ($dbName) 
	or die (mysql_error());

$text = $_POST['cmnt_text'];
$usr = $_POST['cmnt_usr'];
$query = "insert into $CmntsTable values('', $id_post, '$text', '$usr')";
mysql_query($query)
	or die (mysql_error()); 

mysql_close($link);

header("location: postview.php?id=$id_post");

?>