
<?php

class Edit{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    // insert into user table
    public  function editBook($author, $name, $user, $stock, $image, $item_id ){
        if ($this->db->con != null){
                // create sql query
                $query_string = sprintf("UPDATE product SET item_brand='".$author."',item_name='".$name."',user_id='".$user."',item_stork='".$stock."',item_image='".$image."' WHERE item_id = ".$item_id."");
                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
           
        }
    }
  
   
}








?>