<?php

class Db_object {
  
 public static function find_all(){
  
    return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
 }  //end of find_all method
  
  
  
  
  
  public static function find_by_id($id){
    global $database;
      $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id ");

      return !empty($the_result_array) ? array_shift($the_result_array) : false;
  
  

}  //end of find_by_id method
  
  public static function find_by_query($sql) {
    global $database;
    $result_set = $database->query($sql);  
    $the_object_array = array();
    
    while($row = mysqli_fetch_array($result_set)){
      
      $the_object_array[] = static::instantiation($row);
      
    }
    
    return $the_object_array;
 
    
}//end of find_by_query method
  
public static function instantiation($the_record){
  
        $calling_class = get_called_class();
        $the_object = new $calling_class;
  
  foreach($the_record as $the_attribute => $value) {
    
    if($the_object->has_the_attribute($the_attribute)){
      
      $the_object->$the_attribute = $value;
      
    }
    
  }

        return $the_object;
  
}  // end of instatiation method
  
  
private function has_the_attribute($the_attribute){
  
  $object_properties = get_object_vars($this);
  
  
  return array_key_exists($the_attribute, $object_properties);
  
}/// end of has_the_attribute
  
  
 protected function properties(){
    
    $properties = array();
    
    foreach (static::$db_table_fields as $db_field) {
      
          if(property_exists($this, $db_field)){
              
              $properties[$db_field] = $this->$db_field;
            
          }
      
      }
 return $properties;
    
  }//end of properties method
  
    protected function clean_properties(){
    global $database;
    
    
    $clean_properties = array();
    
    foreach($this->properties() as $key => $value){
      
      $clean_properties[$key] = $database->escape_string($value);
      
    }
    
    return $clean_properties;
    
    
  }//end of clean_properties method
  
 
  public function create() {
    global $database;
    
    $properties = $this->clean_properties();
     
     $sql  = " INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
     $sql .= "VALUES('". implode("','", array_values($properties))  ."')" ;
     
    
    if( $database->query($sql)) {
      
      $this->id = $database->the_insert_id();
      
      return true;
      
      
    }else{
      
      return false;
      
    } 
  }//end of create method
  
  public function update(){
    global $database;
    
    $properties = $this->properties();
    
    $property_pairs = array();
    
      foreach($properties as $key => $value){
        
        $property_pairs[] = "{$key}='{$value}'"; 
        
      }
    
    $sql = "UPDATE " . static::$db_table . " SET ";
    $sql .= implode(", ", $property_pairs);
    $sql .= " WHERE id= " . $database->escape_string($this->id);
    
   $database->query($sql);
    
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    
  }// END OF UPDATE METHOD
  
  
  
  public function delete(){
    global $database;
    
    $sql = "DELETE FROM " . static::$db_table . " WHERE id= "."'" . $database->escape_string($this->id) . "'" . " LIMIT 1";
    $database->query($sql);
    
    
   return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }//end of delete method
  
  
  
  
    public function save(){
    
    return isset($this->id) ? $this->update() : $this->create();
      
      
      
      
    }//end of save method
  
  
}//end of Db_object Class






















?>
