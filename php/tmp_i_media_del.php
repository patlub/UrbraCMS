<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$i_media = $_POST['imedia'];
$_SESSION['del_multi_ids'] = $i_media;
echo true;
