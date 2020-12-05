<?php
// session_start();
require_once 'dbconfig.php';
require_once "login_valid.php";

try{
    $title = $_POST['title'];
    $descrip = $_POST['descrip'];
    $assign = $_POST['assigned'];
    $created = $_SESSION['id'];
    $typeof = $_POST['typeof'];
    // echo $typeof;
    $priority = $_POST['pri'];
    $datetime = date("Y-m-d");
    $stat ='open';

    if($typeof=='1'){
        $typeof ='bug';
    }
    elseif($typeof=='2'){
        $typeof ='proposal';
    }
    elseif($typeof=='3'){
        $typeof ='task';
    }

    if($priority=='1'){
        $priority ='minor';
    }
    elseif($priority=='2'){
        $priority ='major';
    }
    elseif($priority=='3'){
        $priority ='critical';
    }

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password1);
    $stmt = $conn->query("SELECT id, firstname, lastname FROM users");
    $insertdata = "INSERT INTO issues(title,descrip,typeof,priority,stat,assigned_to,created_by, created,updated) VALUES('$title','$descrip','$typeof','$priority','$stat','$assign','$created',NOW(),NOW())";
    $stmt = $conn->query($insertdata);

    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    exit;


}
catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}


?>
