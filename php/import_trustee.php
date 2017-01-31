<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');

$file = $_FILES['csv_file']['tmp_name'];

$trustee = new Trustee();
$result = $trustee->trustee_import($file);
echo $result;