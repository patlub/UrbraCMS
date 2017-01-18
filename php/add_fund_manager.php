<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');

$name = $_POST['name'];
$category = $_POST['category'];
$address = $_POST['address'];
$web_link = $_POST['link'];

$fund_manager = FundManager::new_fund_manager($name, $category, $address, $web_link);
$result = $fund_manager->add_fund_manager();
echo $result;