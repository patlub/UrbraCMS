<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');

$tabs = $_POST['tabs'];
$details = $_POST['details'];

$fund_manager = new FundManager();
$result = $fund_manager->update_fund_manager_law($tabs, $details);
if($result){
    header('location:../fund_manager_law.php');
}