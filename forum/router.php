<?php

$path = $_GET['query'];
$subpaths = explode('/', $path);

if ($subpaths[0] == "posts") {
  require('post.php');
  if (preg_match("/^[\d]+$/",$subpaths[1])) {
    $post_id = $subpaths[1];
    require('comment.php');
    
    if (!$subpaths[2]) {
      $post = new Posts;
      dblink("connect");
      $post -> view($post_id);
      dblink("close");
    }
    
    if ($subpaths[2] == "delete") {
      $post = new Posts;
      dblink("connect");
      $post -> delete($post_id);
      dblink("close");
    }
    
    if ($subpaths[2] == "add") {
      $cmnt = new Comments;
      dblink("connect");
      $cmnt -> add($post_id,$_POST['cmnt_text'],$_POST['cmnt_usr']);
      dblink("close");
    }
    
    if ($subpaths[2] == "edit") {
      $cmnt = new Posts;
      dblink("connect");
      $cmnt -> edit($post_id);
      dblink("close");
    }
    
    if ($subpaths[2] == "update") {
      $cmnt = new Posts;
      dblink("connect");
      $cmnt -> update($post_id,$_POST['new_text']);
      dblink("close");
    }
    
    if (preg_match("/^[\d]+$/",$subpaths[2])) {
      $cmnt_id = $subpaths[2];
      if ($subpaths[3] == "delete") {
        $cmnt = new Comments;
        dblink("connect");
        $cmnt -> delete($cmnt_id);
        dblink("close");
      }
      
      if ($subpaths[3] == "edit") {
        $cmnt = new Comments;
        dblink("connect");
        $cmnt -> edit($cmnt_id);
        dblink("close");
      }
      
      if ($subpaths[3] == "update") {
        $cmnt = new Comments;
        dblink("connect");
        $cmnt -> update($cmnt_id,$_POST['new_text']);
        dblink("close");
      }
    }
  }

  if (!$subpaths[1]) {
    $post = new Posts;
    dblink("connect");
    $post -> index();
    dblink("close");
  }
  
  if ($subpaths[1] == "new") {
    $post = new Posts;
    $post -> newpost();
  }
  
  if ($subpaths[1] == "create") {
    $post = new Posts;
    dblink("connect");
    $post -> create($_POST['post_text'],$_POST['usr']);
    dblink("close");
  }
}

?>
