<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/EMedia.php');

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$description = $_POST['description'];
$link = $_POST['link'];

$date_array = explode('/', $date);
$date = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];

$e_media = EMedia::new_media($title, $date, $description, $link);
$result = $e_media->edit_media($id);
echo $result;
