<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$e_media = $_POST['emedia'];
$_SESSION['del_multi_ids'] = $e_media;
echo true;
