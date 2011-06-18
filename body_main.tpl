<?php foreach ($posts as $post) { ?>
  <?php echo $post['post_text'] ?> <br>
  <br><b>Написал: </b> <?php echo $post['post_usr'] ?>
  <br><em><a href='postview.php?id="<?php echo $post['post_id'] ?>"'>Комментарии</a></em>
  <br><br>
  <hr noshade width='100%'>
<?php }; ?>


<br><br>
<b><u>Золотой пост</u></b><br><br>
<form action='postwrite.php' method=post name='post'>
  <b>Имя:</b>
  <input type='text' name='usr'><br><br>
  <b>Текст:</b><br>
  <textarea name='post_text' wrap='physical' cols='50' rows='7'></textarea><br>
  <input type='submit' value='yarrr!'>
</form>