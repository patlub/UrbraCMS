<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$tabs = $_POST['tabs'];
$details = $_POST['details'];

$dbh = new DatabaseHelper();
$result = $dbh->update_functions($tabs, $details);
if($result){
    header('location:../functions.php');
}