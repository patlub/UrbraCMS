<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/User.php');

session_start();
$fname = $_POST['first-name'];
$lname = $_POST['last-name'];
$email = $_POST['email'];
$password = $_POST['password'];

$pages = $_POST['pages'];

$user = User::newUser($fname, $lname, $email, $password);
$result = $user->register();
if($result){
    $result = $user->permissions($pages);
}
echo $result;