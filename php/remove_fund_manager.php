<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');

$fund_manager = new FundManager();
$id = $_GET['id'];

$result = $fund_manager->del_fund_manager($id);
if($result){
    header("location: ../fund_managers.php");
}