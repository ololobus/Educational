<?php
$str = "/posts/2/answer";
echo "Initial string: '$str'\n";
echo strpos($str,"/");

$str2 = 'string';
//$chars = preg_split('/\//', $str, -1, PREG_SPLIT_NO_EMPTY);
$chars = explode("/", $str);
print_r($chars);

if ($chars[1] == "posts") {
  $id = $chars[1];
  echo $id;
}
?>