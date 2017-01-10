<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();
$slide_image2 = $homePage->async_get_slide_image(2);

$path = $slide_image2['imagename'];
$caption = $slide_image2['caption'];
echo $path.' '.$caption;