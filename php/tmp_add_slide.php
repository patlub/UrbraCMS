<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();

$caption = $_POST['caption'];
$link = $_POST['link'];

$imgFile = null;
$tmp_dir = null;
$imgSize = null;

if(!empty($_FILES['slideimage'])) {
    $imgFile = $_FILES['slideimage']['name'];
    $tmp_dir = $_FILES['slideimage']['tmp_name'];
    $imgSize = $_FILES['slideimage']['size'];
}

$result = $homePage->tmp_add_slideshow($imgFile,$caption,$link,$tmp_dir,$imgSize);
echo $result;