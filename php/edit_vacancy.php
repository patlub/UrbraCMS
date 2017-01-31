<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Vacancy.php');

$id = $_POST['id'];
$title = $_POST['title'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$description = $_POST['description'];

$s_hour = $_POST['s-hour'];
$s_minute = $_POST['s-minute'];
$e_hour = $_POST['e-hour'];
$e_minute = $_POST['e-minute'];

$attachmentFile = null;
$tmp_dir = null;
$pdfSize = null;

if(!empty($_FILES['attachment'])) {
    $attachmentFile = $_FILES['attachment']['name'];
    $tmp_dir = $_FILES['attachment']['tmp_name'];
    $pdfSize = $_FILES['attachment']['size'];
}
$date_array = explode('/', $start_date);
$start_date = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];
$start_date = $start_date.' '.$s_hour.':'.$s_minute.':'.'00';

$date_array = explode('/', $end_date);
$end_date = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];
$end_date = $end_date.' '.$e_hour.':'.$e_minute.':'.'00';

$vacancy = Vacancy::new_vacancy($title, $start_date, $end_date, $description, $attachmentFile, $tmp_dir, $pdfSize);
$result = $vacancy->edit_vacancy($id);
echo $result;
