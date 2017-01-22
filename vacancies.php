<?php
require_once 'classes/DatabaseHelper.php';
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/main.css">
<!--    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <script>
        $(function () {
            $("#start_date, #end_date").datepicker();
        });
    </script>
    <title>Home Page</title>
</head>
<body>
<div class="container-fluid">
    <?php include_once 'menu.php'; ?>
    <script src="js/loadData.js"></script>
    <div class="col-md-12">
        <div class="success-alert row" align="center">Vacancy has been added</div>
        <div id="deleted-alert" class="srow" align="center">Vacancies have been deleted</div>
        <div class="error row" align="center">Network Error</div>
    </div>
    <div class="row">
        <div class="col-md-2 add-btn-box"><a href="#" data-toggle="modal" data-target="#addVacancyModal">
                <button class="btn btn-primary btn-lg" value="">Add Vacancy +</button>
            </a></div>
    </div>
    <form id="vacancy-form" role="form" enctype="multipart/form-data">

    <div id="table-box" class="row" align="center">
        <script src="js/searchfilter.js" type="text/javascript"></script>
        <input type="text" id="search" onkeyup="Search()" placeholder="Search name" class="form-control">

        <table id="table" cellpadding="0" cellspacing="0" border="0"
               class="table table-striped table-bordered">
            <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Description</th>
                <th>Attachment</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $db_helper = new DatabaseHelper();
            $db_helper->get_vacancies();

            ?>
            </tbody>
        </table>
    </div>
    <div id="delete"><input type="submit" value="Delete" class="btn btn-danger"></div>
</form>
    <div class="loader"><!-- Place at bottom of page --></div>
    <div class="row">
        <?php include_once 'imports/add_vacancy.php'; ?>
    </div>
</div>
</body>
</html>