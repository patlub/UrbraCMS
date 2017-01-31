<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Vacancy.php');


$id = $_POST['id'];
$vacancy  = new Vacancy();
$result = $vacancy->fetch_vacancy($id);
echo $result['title'].'*'.$result['start_date'].'*'.$result['end_date'].'*'.$result['description'].'*'.$result['attachment'].'*'.$result['id'];
