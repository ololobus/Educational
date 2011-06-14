<?php

//------connect-----
$hostname = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbName = "forumdb";
$dbTable = "posts_data";
$link = mysql_pconnect($hostname, $username, $password) 
	or die (mysql_error());

mysql_select_db ($dbName) 
	or die (mysql_error());

//--------add_post-------
$text = $_POST['post_text'];
$usr = $_POST['usr'];
$query = "insert into $dbTable values('', '$text', '$usr')";
mysql_query($query)
	or die (mysql_error()); 

//--------create_comments_table--------
$query_post = "SELECT * FROM $dbTable";
$res_post = mysql_query($query_post)
	or die(mysql_error());
$num_post = mysql_num_rows($res_post);
$query_cmnttb = "create table cmnt_$num_post ( cmnt_id int unsigned not null auto_increment primary key, cmnt_text TEXT, cmnt_usr varchar(30) )";
mysql_query($query_cmnttb)
	or die (mysql_error());

mysql_close($link);

header("location: index.php");

?>