<?php

$path = $_GET['query'];
$subpaths = preg_split('/\//', $path, -1, PREG_SPLIT_NO_EMPTY);

if ($path == "posts/") {
	require('post.php');
	$post = new Posts;
	$post -> index();
}

if ($path == "posts/new") {
	require('post.php');
	$post = new Posts;
	$post -> newpost();
}

if ($path == "posts/create") {
	require('post.php');
	$post = new Posts;
	$post -> create($_POST['post_text'],$_POST['usr']);
}

if ($subpaths[0] == "posts") {
	if (preg_match("/^[\d]+$/",$subpaths[1])) {
		if (!$subpaths[2]) {
			require('post.php');
			$post = new Posts;
			$post -> view($subpaths[1]);
		}
		if ($subpaths[2] == "delete") {
			require('post.php');
			$post = new Posts;
			$post -> delete($subpaths[1]);
		}
		if ($subpaths[2] == "answer") {
			require('comment.php');
			$cmnt = new Comments;
			$cmnt -> newcomment();
		}
		if ($subpaths[2] == "add") {
			require('comment.php');
			$cmnt = new Comments;
			$cmnt -> add($subpaths[1],$_POST['cmnt_text'],$_POST['cmnt_usr']);
		}
	}
}

?>