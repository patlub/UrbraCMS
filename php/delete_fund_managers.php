<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$dbh = new DatabaseHelper();
$fund_managers = $_POST['fund_managers'];

$result = $dbh->del_fund_managers($fund_managers);
echo $result;