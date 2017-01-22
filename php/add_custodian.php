<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');

$name = $_POST['name'];
$category = $_POST['category'];
$address = $_POST['address'];
$web_link = $_POST['link'];


$custodian = Custodian::new_custodian($name, $category, $address, $web_link);
$result = $custodian->add_custodian();
echo $result;