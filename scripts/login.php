<?php
require_once "login_valid.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/login.css">
  <script type="text/javascript" src="scripts/login_validation.js"></script>
  <title>BugMe Issue Tracker</title>
</head>

<body>
<h2>BugMe Issue Tracker Login Portal</h2>

<form onsubmit="return validate()" method="POST">
  <div class="imgcontainer">
    <img src="../logicon.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Your Email" name="email" id="email" required>

    <label for="password"><b> Password </b></label>
    <input type="password" placeholder="Enter your password" name="password" id='password' required>
    </div>
        <?php
        if(isset($errorMsg)){
            echo $errorMsg;
        }
        ?>
        <br>
    <button type="submit" id="loginBtn" name="login">Login</button>

  </div>

</form>

</body>

</html>
