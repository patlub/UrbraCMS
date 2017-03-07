<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');

$name = $_POST['name'];
$address = $_POST['address'];
$web_link = $_POST['link'];
$tel = $_POST['tel'];

$custodian = Custodian::new_custodian($name, $address, $web_link, $tel);
$result = $custodian->add_custodian();
echo $result;