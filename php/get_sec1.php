<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();
$section1 = $homePage->async_get_section(1);

$path = $section1['imagename'];
$heading = $section1['heading'];
$text = $section1['text'];
echo $path.' '.$heading.' '.$text;