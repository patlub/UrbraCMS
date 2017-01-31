<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$bods = $_POST['BoDs'];
$_SESSION['del_multi_ids'] = $bods;
echo true;
