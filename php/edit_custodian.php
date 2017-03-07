<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');

$id= $_POST['id'];
$name = $_POST['edit_name'];
$address = $_POST['edit_address'];
$web_link = $_POST['edit_link'];
$tel = $_POST['edit_tel'];

$custodian = Custodian::new_custodian($name, $address, $web_link, $tel);
$result = $custodian->edit_custodian($id);
echo $result;