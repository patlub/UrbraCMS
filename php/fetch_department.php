<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Department.php');

$id = $_POST['id'];
$department  = new Department();
$result = $department->fetch_department($id);
echo $result['name'].'*'.$result['head'].'*'.$result['id'];
