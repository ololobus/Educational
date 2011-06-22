<?php

class Posts {
	
	function index() {
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
	
	function newpost() {
		require('head.tpl'); ?>
		<b><u>Золотой пост</u></b><br><br>
		<form action='create' method=post name='post'>
			<b>Имя:</b>
			<input type='text' name='usr'><br><br>
			<b>Текст:</b><br>
			<textarea name='post_text' wrap='physical' cols='50' rows='7'></textarea><br>
			<input type='submit' value='yarrr!'>
		</form>
<?php		require('tail.tpl');
	}
	
	function create($text,$usr) {
		require('database.cfg');

		$link = mysql_pconnect($hostname, $username, $password) 
			or die (mysql_error());

		mysql_select_db ($dbName) 
			or die (mysql_error());

		$query = "insert into $PostsTable values('', '$text', '$usr')";
		mysql_query($query)
			or die (mysql_error()); 

		mysql_close($link);
	}
}

?>