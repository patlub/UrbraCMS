<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');

$tabs = $_POST['tabs'];
$details = $_POST['details'];

$trustee = new Trustee();
$result = $trustee->update_trustee_law($tabs, $details);
if($result){
    header('location:../trustee_law.php');
}