<?php

$temp = $_GET['query'];

if ($temp == "posts/") {
	require('post.php');
	$post = new Posts;
	$post -> viewall();
}


?>