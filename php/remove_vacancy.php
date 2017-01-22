<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Vacancy.php');

$vacancy = new Vacancy();
$id = $_GET['id'];

$result = $vacancy->del_vacancy($id);
if($result){
    header("location: ../vacancies.php");
}