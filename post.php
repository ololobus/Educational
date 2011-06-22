<?php

class Posts {
	
	function viewall() {
		require('database.cfg');

		$link = mysql_pconnect($hostname, $username, $password);
		mysql_select_db($dbName);

		$query = "select * from $PostsTable";
		$res = mysql_query($query);

		$posts = array();
		while ($row=mysql_fetch_array($res)) {
		  array_push($posts,$row);
		}

		mysql_close($link);

		require('head.tpl');
		require('body_main.tpl');
		require('tail.tpl');	
	}
	
}

?>