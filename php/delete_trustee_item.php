<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/21/2017
 * Time: 9:03 AM
 */
include('../classes/Trustee.php');

$id = $_GET['id'];

$trustee = new Trustee();
$result = $trustee->delete_trustee_item($id);
if($result){
    header('location:../trustee_law.php');
}