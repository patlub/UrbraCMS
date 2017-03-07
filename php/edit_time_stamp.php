<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$id = $_POST['id'];
$time_stamp = $_POST['edit-stamp'];
$hour = $_POST['hour'];
$minute = $_POST['minute'];

$date_array = explode('/', $time_stamp);
$time_stamp = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];

$time_stamp = $time_stamp.' '.$hour.':'.$minute.':'.'00';
$dbh = new DatabaseHelper();
$result = $dbh->edit_time_stamp($id, $time_stamp);
echo $result;
