<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Custodian.php');


$id = $_POST['id'];
$custodian  = new Custodian();
$result = $custodian->fetch_custodian($id);
echo $result['name'].'-'.$result['address'].'-'.$result['web_link'].'-'.$result['id'].'-'.$result['tel'];
