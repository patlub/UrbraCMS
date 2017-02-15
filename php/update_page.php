<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Page.php');

$id = $_GET['id'];
$name = $_POST['page_name'];
$content = $_POST['content'];
$page = Page::newPage($name, $content);
$result = $page->update_page($id);
echo $result;