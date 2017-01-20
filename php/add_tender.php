<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Tender.php');

$ref_no = $_POST['ref_no'];
$desc = $_POST['desc'];
$category = $_POST['category'];

$deadline = $_POST['deadline'];
$date_awarded = $_POST['date_awarded'];
$dop = $_POST['dop'];

$attachedFile = null;
$tmp_dir = null;
$attachmentSize = null;

if(!empty($_FILES['attachment'])) {
    $attachedFile = $_FILES['attachment']['name'];
    $tmp_dir = $_FILES['attachment']['tmp_name'];
    $attachmentSize = $_FILES['attachment']['size'];
}

$deadline_array = explode('/', $deadline);
$deadline = $deadline_array[2].'-'.$deadline_array[0].'-'.$deadline_array[1];

$date_awarded_array = explode('/', $date_awarded);
$date_awarded = $date_awarded_array[2].'-'.$date_awarded_array[0].'-'.$date_awarded_array[1];

$dop_array = explode('/', $dop);
$dop = $dop_array[2].'-'.$dop_array[0].'-'.$dop_array[1];

$tender = Tender::new_tender($ref_no, $desc, $category, $deadline, $dop, $date_awarded,$attachedFile, $tmp_dir, $attachmentSize);
$result = $tender->add_tender();
echo $result;
