

<?php

class Login{


    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

   // fetch user data using getData Method
   public function getData($table = 'user'){
    $result = $this->db->con->query("SELECT * FROM {$table}");

    $resultArray = array();

    // fetch data data one by one
    while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $resultArray[] = $item;
    }

    return $resultArray;
}

// get user using item id
public function getUser($item_id = null, $table= 'user'){
    if (isset($item_id)){
        $result = $this->db->con->query("SELECT firstname FROM {$table} WHERE 'id '={$item_id}");
        $item = mysqli_fetch_assoc($result);

        return $item;
    }
}


// verify if user is loged in 
public function check_login($user_id = null,  $table = 'user')
{
    if(isset($_SESSION['id']))
    {
        $id = $_SESSION['id'];

        $result = $this->db->con->query("SELECT * FROM {$table} WHERE 'id' ={$id}");
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    
}


}



?>