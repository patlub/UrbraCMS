<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$dbh = new DatabaseHelper();
$schemes = $_POST['schemes'];

$result = $dbh->del_schemes($schemes);
echo $result;