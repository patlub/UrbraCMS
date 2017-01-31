<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$schemes = $_POST['schemes'];
$_SESSION['del_multi_ids'] = $schemes;
echo true;
