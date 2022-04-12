<?php
$message = "";
// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
if( $_POST['password'] ==  $_POST['password2']){        

$check = $Register->check_user($_POST['username']);
if($check){
  $message = "Some one alredy has this user name";
}else{
$params = array(
    "username" => '',
    "shop_name" => '',
    "pass" => '',
);
$Register->registerUser($_POST['username'], $_POST['shop'], $_POST['password'],$params);
header("Location: ./index.php");
}
}
else{
  $message = "Passwords not march";
}

}
?>
<section>
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div style="margin-top:80px; margin-bottom:80px" class="col-md-6">
<form method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">User name</label>
    <input name="username" type="text" class="form-control" id="username" aria-describedby="username" required>
  </div>
  <div class="mb-3">
    <label for="shop" class="form-label">Shop name</label>
    <input name="shop" type="text" class="form-control" id="shop" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Re-enter Password</label>
    <input name ="password2" type="password" class="form-control" id="exampleInputPassword2" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  <a style="color:white" class="btn btn-primary">OR</a>
  <span><a href="login.php" class="btn btn-secondary">Log In</a></span>
</form>
<br/>
<a style="color:red;background-color: rgb(235, 235, 182);border-raduis:3px;"><?php echo $message ?></a>
</div>
<div class="col-md-3"></div>
</div>
</div>
<section>