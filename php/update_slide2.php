<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();

$caption = $_POST['caption2'];
$position = $_POST['position2'];

if(!empty($_FILES['slideimage2'])) {
    $imgFile = $_FILES['slideimage2']['name'];
    $tmp_dir = $_FILES['slideimage2']['tmp_name'];
    $imgSize = $_FILES['slideimage2']['size'];
}

$result = $homePage->update_slideshow($imgFile,$caption,$position,$tmp_dir,$imgSize);
echo $result;