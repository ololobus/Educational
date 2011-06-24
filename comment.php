<?php

class Comments {
  
  function add($post_id,$text,$usr) {
    require('database.cfg');
    $query = "insert into $CmntsTable values('', $post_id, '$text', '$usr')";
    mysql_query($query)
      or die (mysql_error()); 
    header("location: .");
  }
  
  function delete($id) {
    require('database.cfg');
    $deletecmntquery = "delete from $CmntsTable where cmnt_id = $id";
    mysql_query($deletecmntquery)
      or die (mysql_error()); 
    header("location: ../");
  }
  
  function edit($id) {
     require('database.cfg');
     $query_cmnt = "select * from $CmntsTable where cmnt_id = $id";
     $res_cmnt = mysql_query($query_cmnt)
        or die(mysql_error());
     $cmnts = array();
     while ($row_cmnt = mysql_fetch_array($res_cmnt)) { 
        array_push($cmnts,$row_cmnt);
     }
     foreach ($cmnts as $cmnt) {
       $text = $cmnt['cmnt_text'];
       $usr = $cmnt['cmnt_usr'];
     }
     require('head.tpl');
     require('comment_edit.tpl');
     require('tail.tpl');
  }
  
  function update($id,$text) {
     require('database.cfg');
     $query_cmnt = "update $CmntsTable set cmnt_text = '$text' where cmnt_id = $id";
     mysql_query($query_cmnt)
         or die(mysql_error());
     header("location: ../");
   }
  
}

?>