<?php


echo __FILE__ . "<br>";

echo __LINE__ . "<br>";

//echo __DIR__ . "<br>";

if(is_file(__DIR__)) {
  
  echo "yes" . "<br>";
}else{
  echo "No" . "<br>";
}


echo file_exists(__FILE__) ? "yes" : "no";

?>