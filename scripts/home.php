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
  <title>BugMe Issue Tracker</title>
  <link rel="stylesheet" href="../styles/home.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="table.js"></script>
</head>
<body>
  <div class="hide">

  </div>
  <div class="header">
    <h1><i class="material-icons"> bug_report</i>BugMe Issue Tracker</h1>
    <?php echo('<h3>Welcome '.$_SESSION['firstname'].'</h3>') ?>
  </div>
  <div class='container'>
    <div class="sidebar">
      <ul class="">
        <li><a href="home.php"> Home</a></li>
        <li><a href="createuser.php"> Add User</a></li>
        <li><a href="newissue.php"> New Issue</a></li>
        <li><a href="logout.php"> Logout</a></li>
      </ul>
    </div>

    <div class="mainbar">
      <div class="dashtable">
        <div class="inline">
          <h1> Issues </h1>
          <button onclick="window.location.href='newissue.php'">Create New Issue</button>
        </div>
        <div class='filter'>
          <h4>Filter By:</h4>
          <button>ALL</button>
          <button>OPEN</button>
          <button>MY TICKETS</button>
        </div>
        <div id="result">
          <table>
            <tr>
              <th>Title</th>
              <th>Type</th>
              <th>Status</th>
              <th>Assigned To</th>
              <th>Created</th>
            </tr>

        </div>


      </div>
    </div>
  </div>
</body>
</html>
