<?php
require_once "login_valid.php";
if($_SESSION['id']==null){
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../styles/user.css">
  <title>BugMe Issue Tracker</title>
</head>
<body>

  <div class="header">
    <h1><i class="material-icons"> bug_report</i>BugMe Issue Tracker</h1>
  </div>

  <div class="sidebar">
    <ul class="">
      <li><a href="home.php"> Home</a></li>
      <li><a href="createuser.php"> Add User</a></li>
      <li><a href="newissue.php"> New Issue</a></li>
      <li><a href="logout.php"> Logout</a></li>
    </ul>    
  </div>

  <div class="mainbar">
    <div class="formdiv">
      <h1>New User</h1>

      <form name = "adduserForm" action="add_user.php" method="post" >
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" >
      
        <label for="lname">Last Name</label>
        <input type="text" id="lfname" name="lastname" >
      
        <label for="pass"> Password </label>
        <input type="password" id="pass" name="pass"  >
        
        <label for="email"> Email </label>
        <input type="email" id="email" name="email">

        <input class='button' type="submit" onclick="return validate()" value="Submit">
      </form>
    </div>
  </div>

  
</body>
</html>