<?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    session_id() == '';
    if(session_id() == ''){
      header("Location: ./index.php");
    }
  }

?>
<div style="margin:150px;" class="container">
    <h3> Are you srue you want to log out ?</h3>
    <form method="post">
      <button class="btn btn-primary">Log Out</button>
    </form>
      <a style="margin-top:30px;" href="./index.php" class="btn btn-secondary">Go To Home</a>
</div>