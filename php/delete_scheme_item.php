<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/21/2017
 * Time: 9:03 AM
 */
include('../classes/Scheme.php');

$id = $_GET['id'];

$scheme = new Scheme();
$result = $scheme->delete_scheme_item($id);
if($result){
    header('location:../scheme_law.php');
}