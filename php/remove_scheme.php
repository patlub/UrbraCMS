<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');

$scheme = new Scheme();
$id = $_GET['id'];

$result = $scheme->del_scheme($id);
if($result){
    header("location: ../schemes.php");
}