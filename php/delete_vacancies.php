<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$dbh = new DatabaseHelper();
$vacancies = $_POST['vacancies'];

$result = $dbh->del_vacancies($vacancies);
echo $result;