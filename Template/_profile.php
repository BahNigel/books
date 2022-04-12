<?php
    $item_id = $_SESSION['id'] ?? 6;
    foreach ($singelEmployee->getData() as $item) :
       if( $item['id'] == $item_id) :
            //updating profile

            $message = "";
            // request method post
            if($_SERVER['REQUEST_METHOD'] == "POST"){      
            $db = new DBContext();

            class Update{
            public $db = null;
            public function __construct(DBContext $db)
            {
                if (!isset($db->con)) return null;
                $this->db = $db;
            }
            // insert into user table
            public  function updateUser($table = "employees"){
                if ($this->db->con != null){
                        // "Insert into cart(user_id) values (0)"
                            $first =$_POST['firstname'];
                            $last = $_POST['lastname'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];
                            $country = $_POST['country'];
                            $gender = $_POST['gender'];
                            $datebirth = $_POST['datebirth'];

                        // create sql query
                        
                        $query_string = sprintf("UPDATE %s SET
                        'firstname' = $first AND
                        'lastname' = $last AND
                        'email' = $email AND
                        'address' = $address AND
                        'country' = $country AND
                        'gender' = $gender AND
                        'datebirth' = $datebirth 
                         ", $table );

                        // execute query
                        $result = $this->db->con->query($query_string);
                        return $result;
                    
                }
            }


            }

            $Register = new Update($db);
            $Register->updateUser();
            header("Location: ./index.php");
            
            }





?>
<div class="container rounded bg-white mt-5 mb-5">
    <form method="post">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><span class="font-weight-bold"><?php echo $item['firstname'] ?></span><span class="text-black-50"><?php echo $item['email'] ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input name="firstname" type="text" class="form-control" placeholder="<?php echo $item['firstname'] ?>" value=""></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input name="lastname" type="text" class="form-control" value="" placeholder="<?php echo $item['lastname'] ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Address</label><input name="address" type="text" class="form-control" placeholder="<?php echo $item['address']??'address' ?>" value=""></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input name="email" type="text" class="form-control" placeholder="<?php echo $item['email']?? 'E-mail' ?>" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input name="country" type="text" class="form-control" placeholder="<?php echo $item['country']??'Country' ?>" value=""></div>
                </div>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                
                <div class="col-md-12"><label class="labels">Gender</label><input name="gender" type="text" class="form-control" placeholder="<?php echo $item['gender']??'Gender' ?>" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Date of birth</label><input name="datebirth" type="text" class="form-control" placeholder="<?php echo $item['datebirth']??'Date of birth' ?>" value=""></div>
            </div>
        </div>
        <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button" type="button">Update Profile</button></div>
    </div>
       </form>
</div>
</div>
</div>

<?php
       endif;
        endforeach;
?>