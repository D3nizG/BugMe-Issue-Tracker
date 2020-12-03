<?php 
session_start();
require_once 'dbconfig.php';
?>

<?php 

$email = $_POST['email'];
$sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
$password = $_POST['psw'];
$sanitizedPassword = filter_var($password, FILTER_SANITIZE_STRING   );
$errorMsg = '';


if(isset($_POST["login"])) {
    if ($email != '' && $password != ''){
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password1);
            echo "Connected to $dbname at $host";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->query("SELECT email, pword, firstname FROM users");
            $results = $sql ->fetchALL(PDO ::FETCH_ASSOC);

            if($results == 1 && password_verify($sanitizedPassword, $row['pword'])) {
                $_SESSION['sessionEmail'] = $row['email'];
                $_SESSION['sessionUserName'] = $row['firstname'];

            }else{
                $errorMsg = '<label>Invalid Credentials, try again.</label>';
        }
        } catch (PDOException $pe) {
            die("Could not connect to the database $dbname :" . $pe->getMessage());
        }
    }

}
$conn = null;
?>




