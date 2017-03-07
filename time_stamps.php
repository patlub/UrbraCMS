<?php
include_once 'time_out.php';
require_once 'classes/DatabaseHelper.php';

if(!$_SESSION['loggedIn']){
    header("location: signIn.html");
}elseif(!in_array('timestamps', $_SESSION['page_ids'])){
    header("location: forbidden.php");
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#edit-stamp").datepicker();
        });
    </script>
    <title>Time Stamps</title>
</head>
<body>
<div class="container-fluid">
    <script src="js/loadData.js"></script>
    <div class="row">
        <div class="col-md-3 side-menu">
            <?php include_once 'side_menu.php'; ?>
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <?php include_once 'menu.php'; ?>
            </div>
            <div class="col-md-12 page-head">
                Time Stamps
            </div>
            <form id="time-stamps-form" role="form" enctype="multipart/form-data">

                <div id="table-box" class="row" align="center">
                    <table id="table" cellpadding="0" cellspacing="0" border="0"
                           class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Updated</th>
                            <th>List of Licences</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $db_helper = new DatabaseHelper();
                        $db_helper->get_time_stamps();

                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
    <div class="row">
        <?php include_once 'imports/edit_time_stamp.php'; ?>
    </div>
</div>
</body>
</html>