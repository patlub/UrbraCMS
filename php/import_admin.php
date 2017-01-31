<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Administrator.php');


$file = $_FILES['csv_file']['tmp_name'];

$admin = new Administrator();
$result = $admin->admin_import($file);
echo $result;