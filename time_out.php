<?php
/**
 * Created by PhpStorm.
 * User: PATRICK
 * Date: 2/27/2017
 * Time: 1:08 PM
 */

session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header('location:signIn.html');
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
$_SESSION['del_ids'] = null;
$_SESSION['del_multi_ids'] = null;
?>