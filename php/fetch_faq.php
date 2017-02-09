<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Faq.php');

$id = $_POST['id'];
$faq  = new Faq();
$result = $faq->fetch_faq($id);
echo $result['question'].'*'.$result['answer'].'*'.$result['id'];
