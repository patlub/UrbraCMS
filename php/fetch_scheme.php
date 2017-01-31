<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');


$id = $_POST['id'];
$scheme  = new Scheme();
$result = $scheme->fetch_scheme($id);
echo $result['name'].'-'.$result['category'].'-'.$result['address'].'-'.$result['web_link'].'-'.$result['id'];
