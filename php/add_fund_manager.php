<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');

$name = $_POST['name'];
$address = $_POST['address'];
$web_link = $_POST['link'];
$tel = $_POST['tel'];

$fund_manager = FundManager::new_fund_manager($name, $address, $web_link, $tel);
$result = $fund_manager->add_fund_manager();
echo $result;