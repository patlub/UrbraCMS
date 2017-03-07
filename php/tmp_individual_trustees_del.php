<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$trustees = $_POST['individual-trustees'];
$_SESSION['del_multi_ids'] = $trustees;
echo true;
