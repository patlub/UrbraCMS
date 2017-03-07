<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');

$id= $_POST['id'];
$name = $_POST['edit_name'];
$address = $_POST['edit_address'];
$web_link = $_POST['edit_link'];
$tel = $_POST['edit_tel'];

$fund_manager = FundManager::new_fund_manager($name, $address, $web_link, $tel);
$result = $fund_manager->edit_fund_manager($id);
echo $result;