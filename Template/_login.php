
<?php
    $message ='';
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      foreach ($login->getData() as $item)
      {
          if ($username == $item['username']) 
          {
            // Verify the hash against the password entered
            $verify = password_verify($password, $item['pass']);
            
            // Print the result depending if they match
            if (!$verify) 
            {
              $message ='Wrong Password';
            }else
            {
              $message = "loged in";
              session_start();
              $_SESSION['id'] = $item['user_id'];
              $_SESSION['action'] = "logedin";
              header("Location: ./index.php");
            }
            
            
          }
          else
          {
            $message ='Wrong User Name ';
          }
      }
    }
?>

<section>
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div style="margin-top:80px; margin-bottom:80px" class="col-md-6">
<form method="post">
  <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input name="username" type="text" class="form-control" id="username" aria-describedby="username" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name=password type="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a style="color:white" class="btn btn-primary">OR</a>
  <span><a href="register.php" class="btn btn-secondary">Register</a></span>
</form>
<br/>
<a style="color:red;background-color: rgb(235, 235, 182);border-raduis:3px;"><?php echo $message ?></a>
</div>
<div class="col-md-3"></div>
</div>
</div>
<section>