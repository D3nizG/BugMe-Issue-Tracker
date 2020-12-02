<?php

require_once 'dbconfig.php';

try {
    $email = $_POST['email'];
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = $_POST['psw'];
    $sanitizedPassword = filter_var($password, FILTER_SANITIZE_STRING	);

      //email validation
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }


    if(password_verify($sanitizedPassword, $hashed_password)) {
        
    } 



    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password1);
    echo "Connected to $dbname at $host";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT into users(firstname,lastname,pword,email, NOW())
    VALUES ('$firstname','$lastname','$hashed_password','$email')";
    $conn->exec($sql);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
$conn = null;
?>




