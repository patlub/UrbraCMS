<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');

$id= $_POST['id'];
$name = $_POST['edit-name'];
$category = $_POST['edit-category'];
$address = $_POST['edit-address'];
$web_link = $_POST['edit-link'];

$scheme = Scheme::new_scheme($name, $category, $address, $web_link);
$result = $scheme->edit_scheme($id);
echo $result;