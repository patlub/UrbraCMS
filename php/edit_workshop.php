<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Workshop.php');

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$description = $_POST['description'];

$attachmentFile = null;
$tmp_dir = null;
$pdfSize = null;

$date_array = explode('/', $date);
$date = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];

$workshop = Workshop::new_workshop($title, $date, $description, $attachmentFile, $tmp_dir, $pdfSize);
$result = $workshop->edit_workshop($id);
echo $result;
