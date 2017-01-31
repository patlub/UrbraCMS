<?php
session_start();
require_once("../classes/User.php");
$loginEmail = $_POST['loginEmail'];
$password = $_POST['password'];
$user = User::existingUser($loginEmail,$password);
$result = $user->login();
echo $result;
?>