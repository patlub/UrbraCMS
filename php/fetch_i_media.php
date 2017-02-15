<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/IMedia.php');

$id = $_POST['id'];
$imedia  = new IMedia();
$result = $imedia->fetch_media($id);
echo $result['title'].'*'.$result['date_realesed'].'*'.$result['source'].'*'.$result['attachment'].'*'.$result['id'];
