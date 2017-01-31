<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');

$id= $_POST['id'];
$name = $_POST['edit-name'];
$category = $_POST['edit-category'];
$address = $_POST['edit-address'];
$web_link = $_POST['edit-link'];

$fund_manager = FundManager::new_fund_manager($name, $category, $address, $web_link);
$result = $fund_manager->edit_fund_manager($id);
echo $result;