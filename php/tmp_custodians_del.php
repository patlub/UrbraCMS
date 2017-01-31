<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$cust = $_POST['custodians'];
$_SESSION['del_multi_ids'] = $cust;
echo true;
