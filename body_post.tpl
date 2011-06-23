<?php foreach ($posts as $post) { ?>
	<pre><?php echo $post['post_text'] ?></pre>
	<br><b>Написал: </b> <?php echo $post['post_usr'] ?>
	<br>
	<hr noshade width='100%' size=1>
	<br>
<?php }; ?>

<?php foreach ($cmnts as $cmnt) { ?>
	<b> <?php echo $cmnt['cmnt_usr']?>: </b><?php echo $cmnt['cmnt_text'] ?>
	<br>
	<hr noshade width='50%' size=1 align=left>	
	<br>
<?php }; ?>

<a href='answer'>Написать комментарий</a>
<br>
<a href='javascript:history.back()'><---Назад</a>
