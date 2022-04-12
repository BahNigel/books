
<?php

class Book{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    // insert into user table
    public  function registerBook($author, $name, $user, $stock, $image, $params = null, $table = "product"){
        if ($this->db->con != null){
            if ($params != null){
                // get table columns
                $columns = implode(',', array_keys($params));
                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES('$author', '$name', '$user', '$stock', '$image')", $table, $columns);
  
                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
  
   
}








?>