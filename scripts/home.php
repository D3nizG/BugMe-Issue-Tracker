<?php
session_start();

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
        <li><a href="../createuser.html"> Add User</a></li>
        <li><a href="newissue.php"> New Issue</a></li>
        <li><a href="login.php"> Logout</a></li>
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
            <!-- <tr>
              <td>Hello</td>
              <td>Hi</td>
              <td>touche</td>
              <td>yipp</td>
              <td>yaba daba do</td>
              <td>flintsones</td>
            </tr>
            <tr>
              <td>Adele</td>
              <td>japan</td>
              <td>batman</td>
              <td>yab</td>
              <td>shabba</td>
              <td>kingman</td>
            </tr> -->


          <!-- </table> -->
        </div>


      </div>
    </div>
  </div>
</body>
</html>
