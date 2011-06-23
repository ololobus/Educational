<?php

class Comments {
	function newcomment() {
		require('head.tpl'); ?>
		<form action='add' method=post name='comment'>
		<b><u>Остроумный комментарий</u></b><br><br>
		<b>Имя:</b>
		<input type='text' name='cmnt_usr'><br><br>
		<b>Текст:</b><br>
		<textarea name='cmnt_text' WRAP='physical' cols='50' rows='7'></textarea><br>
		<input type='submit' value='Yarrr!'>
		</form>
		<a href='javascript:history.back()'><---Назад</a>
<?php	require('tail.tpl');
	}
	
	function add($post_id,$text,$usr) {
		require('database.cfg');

		$link = mysql_pconnect($hostname, $username, $password) 
			or die (mysql_error());
		mysql_select_db ($dbName) 
			or die (mysql_error());

		$query = "insert into $CmntsTable values('', $post_id, '$text', '$usr')";
		mysql_query($query)
			or die (mysql_error()); 

		mysql_close($link);
		
		echo "Комментарий добавлен";
	}
}

?>