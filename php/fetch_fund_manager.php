<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');


$id = $_POST['id'];
$fund_manager  = new FundManager();
$result = $fund_manager->fetch_fund_manager($id);
echo $result['name'].'-'.$result['category'].'-'.$result['address'].'-'.$result['web_link'].'-'.$result['id'];
