<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Report.php');

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$description = $_POST['description'];

$attachmentFile = null;
$tmp_dir = null;
$pdfSize = null;

if(!empty($_FILES['attachment'])) {
    $attachmentFile = $_FILES['attachment']['name'];
    $tmp_dir = $_FILES['attachment']['tmp_name'];
    $pdfSize = $_FILES['attachment']['size'];
}
$date_array = explode('/', $date);
$date = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];

$report = Report::new_report($title, $date, $description, $attachmentFile, $tmp_dir, $pdfSize);
$result = $report->edit_report($id);
echo $result;
