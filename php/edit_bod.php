<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Bod.php');

$id = $_POST['id'];
$name = $_POST['name'];
$details = $_POST['details'];

$image = null;
$tmp_dir = null;
$imageSize = null;

if(!empty($_FILES['image'])) {
    $image = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
}

$bod = BoD::new_BoD($name, $image, $tmp_dir, $imageSize, $details);
$result = $bod->edit_Bod($id);
echo $result;
