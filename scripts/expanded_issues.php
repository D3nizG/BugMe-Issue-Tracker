<?php
session_start();
require_once 'dbconfig.php';

$issue = $_GET['title'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password1);
$stmt = $conn->query("SELECT id, title, descrip, typeof, priority, stat, assigned_to, created_by, created, updated FROM issues WHERE title=$issue");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach($results as $row){
  $assigned = $row['assigned_to'];
  $createdBy = $row['created_by'];

  $asuser = $conn->query("SELECT firstname, lastname FROM users WHERE id=$assigned");
  $res1 = $asuser->fetchAll(PDO::FETCH_ASSOC);
  $firstname1 = "";
  $lastname1 = "";
  foreach($res1 as $r){
    $firstname1 = $r['firstname'];
    $lastname1 = $r['lastname'];
  }

  $cruser = $conn->query("SELECT firstname, lastname FROM users WHERE id=$createdBy");
  $res2 = $cruser->fetchAll(PDO::FETCH_ASSOC);
  $firstname2 = "";
  $lastname2 = "";
  foreach($res2 as $r){
    $firstname2 = $r['firstname'];
    $lastname2 = $r['lastname'];
  }
  $assignname = $firstname1." ".$lastname1;
  $cruser = $firstname2." ".$lastname2;

  $tabledata = array("id"=>$row['id'],"title"=>$row['title'],"descrip"=>$row['descrip'],"typeof"=>$row['typeof'],"priority"=>$row['priority'],"stat"=>$row['stat'],
  "assigned_to"=>$assignname,"created_by"=>$cruser,"created"=>$row['created'],"updated"=>$row['updated']);
  echo(json_encode($tabledata));
  return;
}


 ?>
