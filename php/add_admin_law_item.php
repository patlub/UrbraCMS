<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Administrator.php');

$title = $_POST['title'];
$description = $_POST['description'];

$admin = new Administrator();
$result = $admin->add_admin_law_item($title, $description);
if($result){
    header('location:../admin_law.php');
}