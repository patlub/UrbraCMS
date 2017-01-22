<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/BoD.php');

$bod = new BoD();
$id = $_GET['id'];

$result = $bod->del_bod($id);
if($result){
    header("location: ../BoDs.php");
}