<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');
session_start();

$path = $_POST['path'];
$ids = $_SESSION['del_multi_ids'];

$dbh = new DatabaseHelper();
$result = $dbh->del($ids, $path);
echo $result;
