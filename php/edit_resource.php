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
$category = $_POST['category'];

$resourceFile = null;
$tmp_dir = null;
$resourceSize = null;

if(!empty($_FILES['resource'])) {
    $resourceFile = $_FILES['resource']['name'];
    $tmp_dir = $_FILES['resource']['tmp_name'];
    $resourceSize = $_FILES['resource']['size'];
}

$resource = Resource::new_resource($title, $category, $resourceFile, $tmp_dir, $resourceSize);
$result = $resource->edit_resource($id);
echo $result;
