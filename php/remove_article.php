<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Article.php');

$article = new Article();
$id = $_GET['id'];

$result = $article->del_article($id);
if($result){
    header("location: ../articles.php");
}