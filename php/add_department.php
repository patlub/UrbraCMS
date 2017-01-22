<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Department.php');

$name = $_POST['name'];
$head = $_POST['head'];

$department = Department::new_department($name, $head);
$result = $department->add_department();
echo $result;