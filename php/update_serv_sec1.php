<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');

$homePage = new HomePage();

$heading = $_POST['sub'];
$text = $_POST['sub-text'];
$position = $_POST['position'];
$imgFile = $_FILES['image']['name'];
$tmp_dir = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];

$result = $homePage->update_serv_sec($imgFile,$heading,$text,$position,$tmp_dir,$imgSize);
echo $result;