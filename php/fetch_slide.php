<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/HomePage.php');


$id = $_POST['id'];
$home  = new HomePage();
$result = $home->fetch_slide($id);
echo $result['imagename'].'*'.$result['caption'].'*'.$result['link'].'*'.$result['id'];
