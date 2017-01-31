<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Tender.php');


$id = $_POST['id'];
$tender  = new Tender();
$result = $tender->fetch_tender($id);
echo $result['ref_no'].'*'.$result['desc'].'*'.$result['category'].'*'.$result['deadline'].'*'.$result['date_pub'].'*'.$result['date_awarded'].'*'.$result['attachment'].'*'.$result['id'];
