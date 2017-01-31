<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Resource.php');

$id = $_POST['id'];
$title = $_POST['title'];
$expiry = $_POST['date'];
$category = $_POST['category'];

$resourceFile = null;
$tmp_dir = null;
$resourceSize = null;

if(!empty($_FILES['resource'])) {
    $resourceFile = $_FILES['resource']['name'];
    $tmp_dir = $_FILES['resource']['tmp_name'];
    $resourceSize = $_FILES['resource']['size'];
}

$date_array = explode('/', $expiry);
$expiry = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];

$resource = Resource::new_resource($title, $expiry, $category, $resourceFile, $tmp_dir, $resourceSize);
$result = $resource->add_resource();
echo $result;
