<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');


$file = $_FILES['csv_file']['tmp_name'];

$fund_manager = new FundManager();
$result = $fund_manager->fund_manager_import($file);
echo $result;