<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Administrator.php');

$id= $_POST['id'];
$name = $_POST['edit-name'];
$category = $_POST['edit-category'];
$address = $_POST['edit-address'];
$web_link = $_POST['edit-link'];

$admin = Administrator::new_administrator($name, $category, $address, $web_link);
$result = $admin->edit_admin($id);
echo $result;