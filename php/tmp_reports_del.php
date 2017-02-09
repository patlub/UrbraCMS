<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$reports = $_POST['reports'];
$_SESSION['del_multi_ids'] = $reports;
echo true;
