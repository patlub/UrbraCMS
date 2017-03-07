<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$link = $_POST['link'];

$dbh = new DatabaseHelper();
$result = $dbh->update_you_tube_link($link);
if($result){
    header('location:../you_tube.php');
}