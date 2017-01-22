<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Administrator.php');

$admin = new Administrator();
$id = $_GET['id'];

$result = $admin->del_admin($id);
if($result){
    header("location: ../administrators.php");
}