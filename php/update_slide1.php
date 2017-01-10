<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();

$caption = $_POST['caption1'];
$position = $_POST['position1'];

if(!empty($_FILES['slideimage1'])) {
    $imgFile = $_FILES['slideimage1']['name'];
    $tmp_dir = $_FILES['slideimage1']['tmp_name'];
    $imgSize = $_FILES['slideimage1']['size'];
}

$result = $homePage->update_slideshow($imgFile,$caption,$position,$tmp_dir,$imgSize);
echo $result;