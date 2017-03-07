<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Administrator.php');

$tabs = $_POST['tabs'];
$details = $_POST['details'];

$admin = new Administrator();
$result = $admin->update_admin_law($tabs, $details);
if($result){
    header('location:../admin_law.php');
}