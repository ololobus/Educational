<?php

$temp = $_GET['query'];

if ($temp == "posts/") {
	require('post.php');
	$post = new Posts;
	$post -> index();
}

if ($temp == "posts/new") {
	require('post.php');
	$post = new Posts;
	$post -> newpost();
}

if ($temp == "posts/create") {
	require('post.php');
	$post = new Posts;
	$post -> create($_POST['post_text'],$_POST['usr']);
	$post -> index();
}

?>