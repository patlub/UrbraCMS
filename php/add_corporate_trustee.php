<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');

$name = $_POST['name'];
$address = $_POST['address'];
$web_link = $_POST['link'];
$tel = $_POST['tel'];

$trustee = Trustee::new_corporate_trustee($name, $address, $web_link, $tel);
$result = $trustee->add_corporate_trustee();
echo $result;