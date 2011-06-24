<b><u>Редактирование поста</u></b><br><br>
<form action='update' method=post name='post'>
<b>Написал: </b><?php echo "$usr"; ?>
<br>
<br>
<b>Текст:</b><br>
<textarea name='new_text' wrap='physical' cols='100' rows='15'><?php echo "$text"; ?></textarea><br>
<input type='submit' value='Изменить'>
</form><br>
<a href='.'><---Назад</a>