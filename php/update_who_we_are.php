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
$result = $dbh->update_who_we_are($tabs, $details);
if($result){
    header('location:../who_we_are.php');
}