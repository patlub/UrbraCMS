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
$scheme = $_POST['edit-scheme'];
$tel = $_POST['edit-tel'];

$trustee = Trustee::new_individual_trustee($name, $scheme, $tel);
$result = $trustee->edit_individual_trustee($id);
echo $result;