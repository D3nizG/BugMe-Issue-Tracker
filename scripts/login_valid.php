<?php 
session_start();
require_once 'connectdb.php';

$logg='';


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
                 
        
            $_SESSION['id'] = $data['id'];
            $$logg = $_SESSION['id'];
            
            if($count == 1 && password_verify($_POST['password'], $data['pword'])){
                
                $_SESSION['email'] = $_POST['email'];
                header('location:home.php');
            }
            else{
                $errorMsg = '<label style="color:red;">Invalid email or password!</label>';
            }
        
        } 
    
    }
// $$logg = $_SESSION['id'];
?>