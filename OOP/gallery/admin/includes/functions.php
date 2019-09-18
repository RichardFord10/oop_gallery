<?php

function class_auto_loader($class){
  
  
  $class = strtolower($class);
  
  $the_path = INCLUDES_PATH . "/{$class}.php";
  
  if(is_file($the_path) && !class_exists($class)) {
    
    include $the_path;
    
    
  }
  

}

spl_autoload_register('class_auto_loader');


/********************************************/

function redirect($url){
  
     header("Location: $url");

}




?>