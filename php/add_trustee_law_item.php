<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');

$title = $_POST['title'];
$description = $_POST['description'];

$trustee = new Trustee();
$result = $trustee->add_trustee_law_item($title, $description);
if($result){
    header('location:../trustee_law.php');
}