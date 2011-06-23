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
			<textarea name='post_text' wrap='physical' cols='100' rows='10'></textarea><br>
			<input type='submit' value='Yarrr!'>
		</form><br>
		<a href='javascript:history.back()'><---Назад</a>
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
		echo "Пост добавлен";
		
	}
	
	function view($id) {
		require('database.cfg');
		$link_post = mysql_pconnect($hostname, $username, $password) 
			or die (mysql_error());
		mysql_select_db ($dbName) 
			or die (mysql_error());
		
		$query_post = "select * from $PostsTable where post_id = $id";
		$res_post = mysql_query($query_post)
			or die(mysql_error());
		$posts = array();
		while ($row_post = mysql_fetch_array($res_post)) { 
			array_push($posts,$row_post);
		}

		$query_cmnt = "select * from $CmntsTable where post_id = $id";
		$res_cmnt = mysql_query($query_cmnt)
			or die(mysql_error());
		$cmnts = array();
		while ($row_cmnt = mysql_fetch_array($res_cmnt)) {
			array_push($cmnts,$row_cmnt);
		}

		mysql_close($link_post);
		
		require('head.tpl');
		require('body_post.tpl');
		require('tail.tpl');
	}
	
	function delete($id) {
		require('database.cfg');
		$link = mysql_pconnect($hostname, $username, $password) 
			or die (mysql_error());
		mysql_select_db ($dbName) 
			or die (mysql_error());

		$deletepostquery = "delete from $PostsTable where post_id = $id";
		mysql_query($deletepostquery)
			or die (mysql_error()); 
		mysql_close($link);
		$deletecmntsquery = "delete from $CmntsTable where post_id = $id";
		mysql_query($deletecmntsquery)
			or die (mysql_error()); 
		
		mysql_close($link);
		echo "Пост удален";
	}
}

?>