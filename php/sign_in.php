<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();

require_once("../classes/User.php");

$loginEmail = $_POST['loginEmail'];
$password = $_POST['password'];

$user = User::existingUser($loginEmail,$password);
$result = $user->login();
if($result){
    $user->get_permissions();
}
echo $result;
