<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');

$custodian = new Custodian();
$id = $_GET['id'];

$result = $custodian->del_custodian($id);
if($result){
    header("location: ../custodians.php");
}