<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$id = $_POST['id'];
$dbh  = new DatabaseHelper();
$result = $dbh->fetch_time_stamp($id);
echo $result['last_updated'].'*'.$result['licences'].'*'.$result['id'];
