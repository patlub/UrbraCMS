<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');

$name = $_POST['name'];
$category = $_POST['category'];
$address = $_POST['address'];
$web_link = $_POST['link'];

$trustee = Trustee::new_trustee($name, $category, $address, $web_link);
$result = $trustee->add_trustee();
echo $result;