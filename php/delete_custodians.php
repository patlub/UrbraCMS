<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$dbh = new DatabaseHelper();
$custodians = $_POST['custodians'];

$result = $dbh->del_custodians($custodians);
echo $result;