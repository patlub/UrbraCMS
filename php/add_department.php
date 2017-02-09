<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Department.php');

$image = null;
$tmp_dir = null;
$imageSize = null;

if(!empty($_FILES['image'])) {
    $image = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
}

$dep = Department::new_dep($image,$tmp_dir,$imageSize);
$result = $dep->add_dep();
echo $result;