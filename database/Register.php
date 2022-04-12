<?php

// php user class
class Register{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    // insert into user table
    public  function registerUser($username, $shop, $pass, $params = null, $table = "user"){
        if ($this->db->con != null){
            if ($params != null){
                // get table columns
                $columns = implode(',', array_keys($params));
                $hash = password_hash($pass, PASSWORD_DEFAULT);
  
                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES('$username', '$shop', '$hash')", $table, $columns);
  
                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
  
    public function check_user($first1){
      $query_string = sprintf("SELECT * FROM user WHERE username == '$first1'");
      $result = $this->db->con->query($query_string);
      return $result;
  
    }
  
  
  }