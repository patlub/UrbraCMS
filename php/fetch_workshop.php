<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Workshop.php');

$id = $_POST['id'];
$workshop  = new Workshop();
$result = $workshop->fetch_workshop($id);
echo $result['title'].'*'.$result['dateheld'].'*'.$result['desc'].'*'.$result['id'];
