<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Resource.php');


$id = $_POST['id'];
$resource  = new Resource();
$result = $resource->fetch_resource($id);
echo $result['name'].'*'.$result['end_date'].'*'.$result['category'].'*'.$result['pdf'].'*'.$result['id'];
