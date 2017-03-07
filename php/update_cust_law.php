<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');

$tabs = $_POST['tabs'];
$details = $_POST['details'];

$cust = new Custodian();
$result = $cust->update_custodian_law($tabs, $details);
if($result){
    header('location:../custodian_law.php');
}