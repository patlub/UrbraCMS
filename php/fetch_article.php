<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Article.php');


$id = $_POST['id'];
$article  = new Article();
$result = $article->fetch_article($id);
echo $result['title'].'*'.$result['article'].'*'.$result['date'].'*'.$result['attachment'].'*'.$result['expiry'].'*'.$result['id'];
