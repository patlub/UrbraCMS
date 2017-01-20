<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Vacancy.php');

$name = $_POST['name'];
$date = $_POST['date'];
$details = $_POST['details'];

$pdfFile = null;
$tmp_dir = null;
$pdfSize = null;

if(!empty($_FILES['pdf'])) {
    $pdfFile = $_FILES['pdf']['name'];
    $tmp_dir = $_FILES['pdf']['tmp_name'];
    $pdfSize = $_FILES['pdf']['size'];
}
$date_array = explode('/', $date);
$date = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];

$vacancy = Vacancy::new_vacancy($name, $date, $details, $pdfFile, $tmp_dir, $pdfSize);
$result = $vacancy->add_vacancy();
echo $result;
