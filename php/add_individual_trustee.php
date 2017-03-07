<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');

$name = $_POST['name'];
$scheme = $_POST['scheme'];
$tel = $_POST['tel'];

$trustee = Trustee::new_individual_trustee($name, $scheme, $tel);
$result = $trustee->add_individual_trustee();
echo $result;