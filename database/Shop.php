<?php

// php shop class
class Shop
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into shop table
    public  function insertIntoShop($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into shop(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into shop table
    public  function addToShop($userid, $itemid){
        if (isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insert data into shop
            $result = $this->insertIntoShop($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete shop item using shop item id
    public function deleteShop($item_id = null){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM product WHERE item_id = ".$item_id."");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
// changing number in stock
public function change($item, $item_id = null){
    if($item_id != null){
        $result = $this->db->con->query("UPDATE product SET item_stork = ".$item." WHERE item_id = ".$item_id."");
        if($result){
            header("Location:" . $_SERVER['PHP_SELF']);
        }
        return $result;
    }
}

// changing number in stock
public function ShopeName( $item_id = null){
    if($item_id != null){
        $result = $this->db->con->query("SELECT shop_name FROM user WHERE user_id = ".$item_id." ");
        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
}

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // get item_it of shopping shop list
    public function getShopId($shopArray = null, $key = "item_id"){
        if ($shopArray != null){
            $shop_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $shopArray);
            return $shop_id;
        }
    }

    // Save for later
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            // execute multiple query
            $result = $this->db->con->multi_query($query);

            if($result){
                header("Location :" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }


}