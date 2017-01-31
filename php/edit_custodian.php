<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');

$id= $_POST['id'];
$name = $_POST['edit-name'];
$category = $_POST['edit-category'];
$address = $_POST['edit-address'];
$web_link = $_POST['edit-link'];

$custodian = Custodian::new_custodian($name, $category, $address, $web_link);
$result = $custodian->edit_custodian($id);
echo $result;