<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');

$tabs = $_POST['tabs'];
$details = $_POST['details'];

$scheme = new Scheme();
$result = $scheme->update_scheme_law($tabs, $details);
if($result){
    header('location:../scheme_law.php');
}