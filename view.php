<?php

$hostname = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbName = "forumdb";
$dbTable = "posts_data";
$link = mysql_pconnect($hostname, $username, $password) 
	or die (mysql_error());

mysql_select_db ($dbName) 
	or die (mysql_error());

$query = "SELECT * FROM $dbTable";
$res = mysql_query($query)
	or die(mysql_error());
$num = mysql_num_rows($res);

while ($row=mysql_fetch_array($res)) { 
    echo $row['post_text']."<br>"; 
    echo "<br><b>Написал: </b>" .$row['post_usr'];
	echo "<br><em><A href='postview.php?id=" .$row['post_id']. "'>Комментарии</A></em>"; 
    echo "<br><br>";
	echo "<HR NOSHADE WIDTH='100%'>";
	}

mysql_close($link);

echo "<br><br>
<FORM ACTION='postwrite.php' METHOD=POST NAME='post'>
<b><u>Золотой пост</u></b><br><br>
<b>Имя:</b>
<INPUT TYPE='text' name='usr'><br><br>
<b>Текст:</b><br>
<TEXTAREA name='post_text' WRAP='physical' COLS='50' ROWS='7'></TEXTAREA><br>
<INPUT TYPE='submit' VALUE='Yarrr!'>
</FORM>";

?>
