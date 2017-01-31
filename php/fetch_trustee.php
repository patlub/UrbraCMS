<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Trustee.php');


$id = $_POST['id'];
$trustee  = new Trustee();
$result = $trustee->fetch_trustee($id);
echo $result['name'].'-'.$result['category'].'-'.$result['address'].'-'.$result['web_link'].'-'.$result['id'];
