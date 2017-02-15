<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 1/5/2017
 * Time: 3:37 PM
 */
include('../classes/Scheme.php');

$app = $_POST['application'];
$refusal = $_POST['refusal'];
$restrict = $_POST['restrict'];
$validity = $_POST['validity'];
$revocation = $_POST['revocation'];
$function = $_POST['functions'];

$scheme = new Scheme();
$result = $scheme->update_scheme_law($app, $refusal, $restrict, $validity, $revocation, $function);
echo $result;