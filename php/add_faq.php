<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Faq.php');

$question = $_POST['question'];
$answer = $_POST['answer'];

$faq = Faq::new_faq($question, $answer);
$result = $faq->add_faq();
echo $result;