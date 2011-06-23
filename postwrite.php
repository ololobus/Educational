<?php

require('database.cfg');

//------connect-----
$link = mysql_pconnect($hostname, $username, $password);
//	or die (mysql_error());

mysql_select_db ($dbName);
//	or die (mysql_error());

//--------add_post-------
$text = $_POST['post_text'];
$usr = $_POST['usr'];
$query = "insert into $PostsTable values('', '$text', '$usr')";
mysql_query($query)
	or die (mysql_error());

mysql_close($link);

header("location: index.php");

?>