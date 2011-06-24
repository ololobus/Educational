<?php

class Posts {
   
   function index() {
      require('database.cfg');
      $query = "select * from $PostsTable";
      $res = mysql_query($query);
      $posts = array();
      while ($row=mysql_fetch_array($res)) {
        array_push($posts,$row);
      }
      require('head.tpl');
      require('body_main.tpl');
      require('tail.tpl'); 
   }

   function newpost() {
      require('head.tpl');
      require('post_input.tpl');
      require('tail.tpl');
   }
   
   function create($text,$usr) {
      require('database.cfg');
      $query = "insert into $PostsTable values('', '$text', '$usr')";
      mysql_query($query)
         or die (mysql_error()); 
      header("location: .");      
   }
   
   function view($id) {
      require('database.cfg');
      $query_post = "select * from $PostsTable where post_id = $id";
      $res_post = mysql_query($query_post)
         or die(mysql_error());
      $posts = array();
      while ($row_post = mysql_fetch_array($res_post)) { 
         array_push($posts,$row_post);
      }
      $query_cmnt = "select * from $CmntsTable where post_id = $id";
      $res_cmnt = mysql_query($query_cmnt)
         or die(mysql_error());
      $cmnts = array();
      while ($row_cmnt = mysql_fetch_array($res_cmnt)) {
         array_push($cmnts,$row_cmnt);
      }
      require('head.tpl');
      require('body_post.tpl');
      require('comment_input.tpl');
      require('tail.tpl');
   }
   
   function delete($id) {
      require('database.cfg');
      $deletepostquery = "delete from $PostsTable where post_id = $id";
      mysql_query($deletepostquery)
         or die (mysql_error()); 
      mysql_close($link);
      $deletecmntsquery = "delete from $CmntsTable where post_id = $id";
      mysql_query($deletecmntsquery)
         or die (mysql_error()); 
      header("location: ../");
   }
   
   function edit($id) {
     require('database.cfg');
     $query_post = "select * from $PostsTable where post_id = $id";
     $res_post = mysql_query($query_post)
        or die(mysql_error());
     $posts = array();
     while ($row_post = mysql_fetch_array($res_post)) { 
        array_push($posts,$row_post);
     }
     foreach ($posts as $post) {
       $text = $post['post_text'];
       $usr = $post['post_usr'];
     }
     require('head.tpl');
     require('post_edit.tpl');
     require('tail.tpl');
   }
   
   function update($id,$text) {
     require('database.cfg');
     $query_post = "update $PostsTable set post_text = '$text' where post_id = $id";
     mysql_query($query_post)
         or die(mysql_error());
     header("location: .");
   }
    
}


function dblink($action) {
  require('database.cfg');
  if ($action == "connect") {
    $link = mysql_pconnect($hostname, $username, $password)
      or die (mysql_error());
    mysql_select_db ($dbName) 
      or die (mysql_error());
  }
  if ($action == "close") {
    mysql_close($link);
  }
}

?>