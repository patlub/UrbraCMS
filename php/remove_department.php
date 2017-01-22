<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Department.php');

$department = new Department();
$id = $_GET['id'];

$result = $department->del_department($id);
if($result){
    header("location: ../departments.php");
}