<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
	A {
	color: #000000;
	text-decoration: none;
	}
	A:visited {
	color: #000000;
	}
	A:hover {
	color: #000000; 
	text-decoration: underline;
	}
</style>


<?php

$hostname = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbName = "forumdb";
$dbTable = "posts_data";
$id_post = $_GET['id'];

$link_post = mysql_pconnect($hostname, $username, $password) 
	or die (mysql_error());

mysql_select_db ($dbName) 
	or die (mysql_error());

//-------post_view---------------
$query_post = "SELECT * FROM $dbTable where post_id = $id_post";
$res_post = mysql_query($query_post)
	or die(mysql_error());

while ($row_post = mysql_fetch_array($res_post)) { 
	echo $row_post['post_text']. "<br><br>"; 
	echo "<b>Написал: </b>" .$row_post['post_usr'] ; 
	echo "<br><br>";
	}
echo "<HR NOSHADE WIDTH='100%'>";

//--------comments_view------------
$query_cmnt = "select * from cmnt_$id_post";
$res_cmnt = mysql_query($query_cmnt)
	or die(mysql_error());
	
while ($row_cmnt = mysql_fetch_array($res_cmnt)) {
	echo "<b>" .$row_cmnt['cmnt_usr']. ": </b>" .$row_cmnt['cmnt_text'];
	echo "<br><br>";
	}

mysql_close($link_post);

echo "<br><br>
<FORM ACTION='cmntwrite.php?id=$id_post' METHOD=POST NAME='comment'>
<b><u>Остроумный комментарий</u></b><br><br>
<b>Имя:</b>
<INPUT TYPE='text' name='cmnt_usr'><br><br>
<b>Текст:</b><br>
<TEXTAREA name='cmnt_text' WRAP='physical' COLS='50' ROWS='7'></TEXTAREA><br>
<INPUT TYPE='submit' VALUE='Yarrr!'>
</FORM>
<A href='index.php'><---На глагне</A>";

?>


