<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$functions = $_POST['functions'];

$dbh = new DatabaseHelper();
$result = $dbh->update_functions($functions);
echo $result;