<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();

$caption = $_POST['caption3'];
$position = $_POST['position3'];
//$imgFile = null;

if(!empty($_FILES['slideimage3'])) {
    $imgFile = $_FILES['slideimage3']['name'];
    $tmp_dir = $_FILES['slideimage3']['tmp_name'];
    $imgSize = $_FILES['slideimage3']['size'];
}

$result = $homePage->update_slideshow($imgFile,$caption,$position,$tmp_dir,$imgSize);
echo $result;