<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');

$title = $_POST['title'];
$description = $_POST['description'];

$custodian = new Custodian();
$result = $custodian->add_custodian_law_item($title, $description);
if($result){
    header('location:../custodian_law.php');
}