<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$funders = $_POST['fund_managers'];
$_SESSION['del_multi_ids'] = $funders;
echo true;
