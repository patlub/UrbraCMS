<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/EMedia.php');

$id = $_POST['id'];
$imedia  = new EMedia();
$result = $imedia->fetch_media($id);
echo $result['title'].'*'.$result['date_realesed'].'*'.$result['source'].'*'.$result['link'].'*'.$result['id'];
