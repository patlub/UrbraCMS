<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/22/2017
 * Time: 9:42 AM
 */

include('../classes/User.php');
session_start();

$old_password = $_POST['password'];
$new_pass = $_POST['new-password'];

$user = new User();
$result = $user->changePassword($old_password,$new_pass);

if($result){
    header('location: ../change_pass.php');
}