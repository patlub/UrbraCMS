<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Tender.php');

$tender = new Tender();
$id = $_GET['id'];

$result = $tender->del_tender($id);
if($result){
    header("location: ../tenders.php");
}