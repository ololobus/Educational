<?php

require('database.cfg');

$link = mysql_pconnect($hostname, $username, $password) 
  or die (mysql_error());

$createDB = "create database $dbName";
mysql_query($createDB)
  or die(mysql_error());
mysql_select_db ($dbName) 
  or die (mysql_error());

$createPostsTable = "create table $PostsTable ( post_id int unsigned not null auto_increment primary key, post_text TEXT, post_usr varchar(30) )";
mysql_query($createPostsTable)
  or die(mysql_error());
  
$createCmntsTable = "create table $CmntsTable ( cmnt_id int unsigned not null auto_increment primary key, post_id int unsigned not null, cmnt_text TEXT, cmnt_usr varchar(30) )";
mysql_query($createCmntsTable)
  or die(mysql_error());

mysql_close($link);

?>