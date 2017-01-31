<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Article.php');

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$article = $_POST['article'];
$expiry = $_POST['expiry'];
$hour = $_POST['hour'];
$minute = $_POST['minute'];

$resourceFile = null;
$tmp_dir = null;
$resourceSize = null;

if(!empty($_FILES['resource'])) {
    $resourceFile = $_FILES['resource']['name'];
    $tmp_dir = $_FILES['resource']['tmp_name'];
    $resourceSize = $_FILES['resource']['size'];
}
$date_array = explode('/', $date);
$date = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];

$date_array = explode('/', $expiry);
$expiry = $date_array[2].'-'.$date_array[0].'-'.$date_array[1];

$expiry = $expiry.' '.$hour.':'.$minute.':'.'00';

$artical = Article::new_article($title, $article, $date, $expiry, $resourceFile, $tmp_dir, $resourceSize);
$result = $artical->edit_article($id);
echo $result;
