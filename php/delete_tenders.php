<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$dbh = new DatabaseHelper();
$tenders = $_POST['tenders'];

$result = $dbh->del_tenders($tenders);
echo $result;