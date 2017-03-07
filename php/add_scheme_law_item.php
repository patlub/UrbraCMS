<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');

$title = $_POST['title'];
$description = $_POST['description'];

$scheme = new Scheme();
$result = $scheme->add_scheme_law_item($title, $description);
if($result){
    header('location:../scheme_law.php');
}