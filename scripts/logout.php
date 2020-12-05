<?php

require_once "login_valid.php";
session_destroy();

header('location: login.php');

?>