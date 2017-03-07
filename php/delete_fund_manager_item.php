<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/21/2017
 * Time: 9:03 AM
 */
include('../classes/FundManager.php');

$id = $_GET['id'];

$fund_manager = new FundManager();
$result = $fund_manager->delete_fund_manager_item($id);
if($result){
    header('location:../fund_manager_law.php');
}