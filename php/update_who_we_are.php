<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/DatabaseHelper.php');

$summary = $_POST['summary'];
$vision = $_POST['vision'];
$mission = $_POST['mission'];
$values = $_POST['values'];
$sector_bg = $_POST['sector_bg'];
$objectives = $_POST['objectives'];
$bg = $_POST['bg'];
$mandate = $_POST['mandate'];
$powers = $_POST['powers'];

$dbh = new DatabaseHelper();
$result = $dbh->update_who_we_are($summary,$vision,$mission,$values,$sector_bg,$objectives,$bg,$mandate,$powers);
echo $result;