<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Tender.php');

$name = $_POST['name'];
$date = $_POST['date'];

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

$tender = Tender::new_tender($name, $date, $pdfFile, $tmp_dir, $pdfSize);
$result = $tender->add_tender();
echo $result;
