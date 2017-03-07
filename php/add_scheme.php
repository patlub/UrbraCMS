<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');

$name = $_POST['name'];
$address = $_POST['address'];
$web_link = $_POST['link'];
$tel = $_POST['tel'];

$scheme = Scheme::new_scheme($name, $address, $web_link, $tel);
$result = $scheme->add_scheme();
echo $result;