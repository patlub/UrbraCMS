<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/21/2017
 * Time: 9:03 AM
 */
include('../classes/Administrator.php');

$id = $_GET['id'];

$admin = new Administrator();
$result = $admin->delete_admin_item($id);
if($result){
    header('location:../admin_law.php');
}