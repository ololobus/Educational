<?php

require('database.cfg');

$id_post = $_GET['id'];

$link_post = mysql_pconnect($hostname, $username, $password) 
	or die (mysql_error());

mysql_select_db ($dbName) 
	or die (mysql_error());

//-------fetch_data---------------
$query_post = "select * from $PostsTable where post_id = $id_post";
$res_post = mysql_query($query_post)
	or die(mysql_error());
$posts = array();
while ($row_post = mysql_fetch_array($res_post)) { 
	array_push($posts,$row_post);
	}

$query_cmnt = "select * from $CmntsTable where post_id = $id_post";
$res_cmnt = mysql_query($query_cmnt)
	or die(mysql_error());
$cmnts = array();
while ($row_cmnt = mysql_fetch_array($res_cmnt)) {
	array_push($cmnts,$row_cmnt);
	}

mysql_close($link_post);

//--------view_data------------

require('head.tpl');
require('body_post.tpl');
require('tail.tpl');
?>


