<?php

require('database.cfg');

$link = mysql_pconnect($hostname, $username, $password);
mysql_select_db($dbName);

$query = "SELECT * FROM $dbTable";
$res = mysql_query($query);
$num = mysql_num_rows($res);

$posts = array();
while ($row=mysql_fetch_array($res)) {
  array_push($posts,$row)
}

mysql_close($link);

require('head.tpl')
require('index.tpl')
require('tail.tpl')

?>