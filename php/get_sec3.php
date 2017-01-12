<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();
$section3 = $homePage->async_get_section(3);

$path = $section3['imagename'];
$heading = $section3['heading'];
$text = $section3['text'];
echo $path.'-'.$heading.'-'.$text;