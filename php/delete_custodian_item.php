<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/21/2017
 * Time: 9:03 AM
 */
include('../classes/Custodian.php');

$id = $_GET['id'];

$custodian = new Custodian();
$result = $custodian->delete_custodian_item($id);
if($result){
    header('location:../custodian_law.php');
}