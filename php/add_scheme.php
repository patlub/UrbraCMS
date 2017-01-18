<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');

$name = $_POST['name'];
$category = $_POST['category'];
$address = $_POST['address'];
$web_link = $_POST['link'];

$scheme = Scheme::new_scheme($name, $category, $address, $web_link);
$result = $scheme->add_scheme();
echo $result;