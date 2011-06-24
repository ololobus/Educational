<b><u>Редактирование комментария</u></b><br><br>
<form action='update' method=post name='comment'>
<b><?php echo "$usr"; ?>:</b>
<br>
<textarea name='new_text' wrap='physical' cols='70' rows='7'><?php echo "$text"; ?></textarea><br>
<input type='submit' value='Изменить'>
</form><br>
<a href='../'><---Назад</a>