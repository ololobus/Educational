<?php foreach ($posts as $post) { ?>
  <?php $post['post_text'] ?> <br>
  <br><b>написал: </b> <?php $post['post_usr'] ?>
  <br><em><a href='postview.php?id="<?php $post['id'] ?>"'>комментарии</a></em>
  <br><br>
  <hr noshade width='100%'>
<?php }; ?>

<br><br>
<b><u>золотой пост</u></b><br><br>
<form action='postwrite.php' method=post name='post'>
  <b>имя:</b>
  <input type='text' name='usr'><br><br>
  <b>текст:</b><br>
  <textarea name='post_text' wrap='physical' cols='50' rows='7'></textarea><br>
  <input type='submit' value='yarrr!'>
</form>