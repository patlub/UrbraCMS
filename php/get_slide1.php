<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();
$slide_image1 = $homePage->async_get_slide_image(1);

$path = $slide_image1['imagename'];
$caption = $slide_image1['caption'];
//$caption = $slide_image1['caption'];
echo $path;