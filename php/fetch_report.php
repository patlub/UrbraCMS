<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Report.php');

$id = $_POST['id'];
$report  = new Report();
$result = $report->fetch_report($id);
echo $result['title'].'*'.$result['date_realesed'].'*'.$result['desc'].'*'.$result['attachment'].'*'.$result['id'];
