<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Administrator.php');


$id = $_POST['id'];
$admin  = new Administrator();
$result = $admin->fetch_admin($id);
echo $result['name'].'-'.$result['category'].'-'.$result['address'].'-'.$result['web_link'].'-'.$result['id'];
