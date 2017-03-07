<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');

$id= $_POST['id'];
$name = $_POST['edit-name'];
$address = $_POST['edit-address'];
$web_link = $_POST['edit-link'];
$tel = $_POST['edit-tel'];

$trustee = Trustee::new_corporate_trustee($name, $address, $web_link, $tel);
$result = $trustee->edit_corporate_trustee($id);
echo $result;