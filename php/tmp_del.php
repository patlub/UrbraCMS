<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
session_start();
$id = $_POST['id'];

if ($_SESSION['del_ids'] != null) {
    $_SESSION['del_ids'] = $_SESSION['del_ids'] . '*' . $id;
}else{
    $_SESSION['del_ids'] = $id;
}
echo true;
