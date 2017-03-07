<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/21/2017
 * Time: 9:03 AM
 */
include('../classes/DatabaseHelper.php');

$id = $_GET['id'];

$dbh = new DatabaseHelper();
$result = $dbh->delete_who_we_are_item($id);
if($result){
    header('location:../who_we_are.php');
}