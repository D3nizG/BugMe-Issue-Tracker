<?php 
session_start();
require_once 'connectdb.php';


if(isset($_POST["login"])) {
    if ($_POST['email'] != '' && $_POST['password'] != ''){
        $query = "SELECT * from `users` where `email`=:email";
        $sql = $conn->prepare($query);
        $sql->execute(
            array(
                'email' => $_POST['email'],        
            )
        );
            $count = $sql->rowCount();
            $data   = $sql->fetch(PDO::FETCH_ASSOC);

            if($count == 1 && password_verify($_POST['password'], $data['pword'])){

                $_SESSION['email'] = $_POST['email'];
                header('location:home.php');

            }else{
                $errorMsg = '<label>Invalid username or password!</label>';
        }
    
        } 
    
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script type="text/javascript" src="scripts/login_validation.js"></script>
  <title>BugMe Issue Tracker</title>
</head>

<body>
  <div class="header">
  </div>
  <div class="login">
    <form method="POST">
      <div class="imgcontainer">
        <img src="../logicon.png" alt="Avatar" class="avatar">
      </div>
        <?php
        if(isset($errorMsg)){
            echo $errorMsg;
        }
        ?>
        <br>
      <div class="container">
        <label for="email"><b> Email </b></label>
        <input type="email" placeholder="Enter your email" name="email" id="email" required>
    
        <label for="password"><b> Password </b></label>
        <input type="password" placeholder="Enter your password" name="password" id='password' required>
        <button type="submit" id="loginBtn" name="login">Login</button>
      </div>
      
  
    </form>

  </div>
</body>

</html>


