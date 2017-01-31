<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');


$file = $_FILES['csv_file']['tmp_name'];

$custodian = new Custodian();
$result = $custodian->custodian_import($file);
echo $result;