<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/FundManager.php');

$app = $_POST['application'];
$refusal = $_POST['refusal'];
$restrict = $_POST['restrict'];
$validity = $_POST['validity'];
$revocation = $_POST['revocation'];
$function = $_POST['functions'];

$fund_manager = new FundManager();
$result = $fund_manager->update_fund_manager_law($app, $refusal, $restrict, $validity, $revocation, $function);
echo $result;