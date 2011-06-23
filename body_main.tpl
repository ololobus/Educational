<?php foreach ($posts as $post) { ?>
	<pre><?php echo $post['post_text'] ?></pre>
	<br><b>Написал: </b> <?php echo $post['post_usr'] ?>
	<br>| <a href='<?php echo $post['post_id'] ?>/'>Комментарии</a> |
	<a href='<?php echo $post['post_id'] ?>/edit'>Редактировать</a> |
	<a href='<?php echo $post['post_id'] ?>/delete'>Удалить</a> |
	<br><br>
	<hr noshade width='100%' size=1>
<?php }; ?>

<h3><a href="new">Написать пост</a></h3>
<hr noshade width='100%' size=1>