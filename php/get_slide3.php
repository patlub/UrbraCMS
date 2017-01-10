<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();
$slide_image3 = $homePage->async_get_slide_image(3);

$path = $slide_image3['imagename'];
$caption = $slide_image3['caption'];
echo $path.' '.$caption;