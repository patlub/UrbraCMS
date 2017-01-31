<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Resource.php');

$resource = new Resource();
$id = $_GET['id'];

$result = $resource->del_resource($id);
if($result){
    header("location: ../resources.php");
}