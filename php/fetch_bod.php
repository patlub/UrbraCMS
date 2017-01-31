<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/BoD.php');


$id = $_POST['id'];
$bod  = new BoD();
$result = $bod->fetch_BoD($id);
echo $result['name'].'*'.$result['id'].'*'.$result['details'];
