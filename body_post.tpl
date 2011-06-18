<?php foreach ($posts as $post) { ?>
  <?php echo $post['post_text'] ?> <br>
  <br><b>Написал: </b> <?php echo $post['post_usr'] ?>
  <br>
  <hr noshade width='100%'>
  <br>
<?php }; ?>

<?php foreach ($cmnts as $cmnt) { ?>
  <b> <?php echo $cmnt['cmnt_usr']?>: </b> <?php echo $cmnt['cmnt_text'] ?>
  <br><br>
<?php }; ?>

<br><br>
<form action='cmntwrite.php?id=<?php echo $id_post ?>' method=post name='comment'>
<b><u>Остроумный комментарий</u></b><br><br>
<b>Имя:</b>
<input type='text' name='cmnt_usr'><br><br>
<b>Текст:</b><br>
<textarea name='cmnt_text' WRAP='physical' cols='50' rows='7'></textarea><br>
<input type='submit' value='Yarrr!'>
</form>
<A href='index.php'><---На глагне</A>
