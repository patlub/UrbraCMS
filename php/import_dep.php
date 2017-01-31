<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Department.php');


$file = $_FILES['csv_file']['tmp_name'];

$department = new Department();
$result = $department->dep_import($file);
echo $result;