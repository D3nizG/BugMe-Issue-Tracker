<?php

require_once 'connectdb.php';

    $firstname = $_POST['firstname'];
    $sanitizedFirstName = filter_var($firstname, FILTER_SANITIZE_STRING	);
    $lastname = $_POST['lastname'];
    $sanitizedLastName = filter_var($lastname, FILTER_SANITIZE_STRING	);
    $password = $_POST['pass'];
    $sanitizedPassword = filter_var($password, FILTER_SANITIZE_STRING	);
    $email = $_POST['email'];
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    //regex
    $uppercase = preg_match('@[A-Z]@', $sanitizedPassword);
    $lowercase = preg_match('@[a-z]@', $sanitizedPassword);
    $number    = preg_match('@[0-9]@', $sanitizedPassword);

    //name validation
    if (!preg_match("/^[a-zA-Z-' ]*$/",$sanitizedFirstName)) {
      $nameErr = "Only letters and white space allowed";
      echo $nameErr;
    }
    //lastname validation
    if (!preg_match("/^[a-zA-Z-' ]*$/",$sanitizedLastName)) {
        $nameErr = "Only letters and white space allowed";
        echo $nameErr;
      }
    
      //email validation
      if (!filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }

    //password validation
    if(!$uppercase || !$lowercase || !$number || strlen($sanitizedPassword) < 8) {
        echo "Password should contain at least one number, one letter, and one capital letter and at least 8 characters long";
    } else{
        $hashed_password = password_hash($sanitizedPassword, PASSWORD_DEFAULT);

    }



    $sql = "INSERT into users(firstname,lastname,pword,email,date_joined)
    VALUES ('$sanitizedFirstName','$sanitizedLastName','$hashed_password','$sanitizedEmail',NOW())";
    $conn->exec($sql);
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    exit;


?>





