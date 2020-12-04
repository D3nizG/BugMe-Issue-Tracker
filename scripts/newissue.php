<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../styles/issue.css">
    <title>BugMe Issue Tracker</title>
  </head>


  <body>

    <div class="header">
      <h1><i class="material-icons"> bug_report</i>BugMe Issue Tracker</h1>
    </div>

    <div class="sidebar">
      <ul class="">
        <li><a href="home.php"> Home</a></li>
        <li><a href="../createuser.html"> Add User</a></li>
        <li><a href="newissue.php"> New Issue</a></li>
        <li><a href="logout.php"> Logout</a></li>
      </ul>
    </div>

    <div class="mainbar">
      <div class="formdiv">

        <h1> Create Issue </h1>
        <form name = "newissue" action="issue.php" method="post">
          <label for="title">Title</label>
          <input type="text" id="title" name="title">
          
          <label for="descrip">Description</label>
          <textarea id="descrip" name="descrip"></textarea>

          <label for="assignedto"> Assigned To </label>
          <!-- <select id="assigned" name="assigned">
            <option value="1"> user one </option>
            <option value="2"> user two </option>
            <option value="3"> user three </option>
          </select> -->
          <?php
            require_once 'dbconfig.php';
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password1);
            $stmt = $conn->query("SELECT id, firstname, lastname FROM users");
            $results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);
            echo "<select name=assigned>";
            foreach($results as $row){
                echo '<option value="'.$row['id'].'">'.$row['firstname'].' '.$row['lastname'].'</option>';
            }
            echo '</select>';
          ?>

          <label for="typeofissue"> Type </label>
          <select id="typeof" name="typeof">
            <option value="1"> Bug </option>
            <option value="2"> Proposal</option>
            <option value="3"> Task</option>
          </select>

          <label for="priority"> Priority </label>
          <select id="pri" name="pri">
            <option value="1"> Minor </option>
            <option value="2"> Major </option>
            <option value="3"> Critical </option>
          </select>

          <input class="button" type="submit" value="Submit">
        </form>
      </div>
    </div>
  </body>

</html>