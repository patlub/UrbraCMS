<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');

$title = $_POST['title'];
$description = $_POST['description'];

$fund_manager = new FundManager();
$result = $fund_manager->add_fund_manager_law_item($title, $description);
if($result){
    header('location:../fund_manager_law.php');
}