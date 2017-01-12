<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();
$section2 = $homePage->async_get_section(2);

$path = $section2['imagename'];
$heading = $section2['heading'];
$text = $section2['text'];
echo $path.'-'.$heading.'-'.$text;