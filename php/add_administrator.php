<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Administrator.php');

$name = $_POST['name'];
$category = $_POST['category'];
$address = $_POST['address'];
$web_link = $_POST['link'];

$admin = Administrator::new_administrator($name, $category, $address, $web_link);
$result = $admin->add_administrator();
echo $result;