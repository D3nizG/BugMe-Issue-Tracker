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
            // $_COOKIE['id'] = $data['id'];
        
            
            
            if($count == 1 && password_verify($_POST['password'], $data['pword'])){
                
                $_SESSION['email'] = $_POST['email'];
                header('location:home.php');
                $_SESSION['id'] = $data['id'];
                $logg = $_SESSION['id'];
            }
            else{
                $errorMsg = '<label style="color:red;">Invalid email or password!</label>';
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
  <link rel="stylesheet" href="../styles/login.css">
  <title>BugMe Issue Tracker</title>
</head>

<body>
<h2>BugMe Issue Tracker Login Portal</h2>

<form method="POST">
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


