<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');

$trustee = new Trustee();
$id = $_GET['id'];

$result = $trustee->del_trustee($id);
if($result){
    header("location: ../trustees.php");
}