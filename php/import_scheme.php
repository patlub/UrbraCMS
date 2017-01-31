<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');

$file = $_FILES['csv_file']['tmp_name'];

$scheme = new Scheme();
$result = $scheme->scheme_import($file);
echo $result;