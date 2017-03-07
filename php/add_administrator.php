<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Administrator.php');

$name = $_POST['name'];
$address = $_POST['address'];
$web_link = $_POST['link'];
$tel = $_POST['tel'];

$admin = Administrator::new_administrator($name, $address, $web_link, $tel);
$result = $admin->add_administrator();
echo $result;