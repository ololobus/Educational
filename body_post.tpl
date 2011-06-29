<?php foreach ($posts as $post) { ?>
   <pre><?php echo $post['post_text'] ?></pre>
   <br><b>Написал: </b> <?php echo $post['post_usr'] ?>
   <br>| <a href="edit">Редактировать</a> |
   <a href="delete">Удалить</a> |
   <br>
   <hr noshade width="100%" size=1>
   <br>
<?php }; ?>

<?php foreach ($cmnts as $cmnt) { ?>
   <b> <?php echo $cmnt['cmnt_usr']?>: </b><?php echo $cmnt['cmnt_text'] ?>
   <br>| <a href="<?php echo $cmnt['cmnt_id'] ?>/edit">Редактировать</a> |
   <a href="<?php echo $cmnt['cmnt_id'] ?>/delete">Удалить</a> |
   <br>
   <hr noshade width="30%" size=1 align=left>   
   <br>
<?php }; ?>
