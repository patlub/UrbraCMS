<?php
include_once 'time_out.php';
require_once 'classes/DatabaseHelper.php';

if(!$_SESSION['loggedIn']){
    header("location: signIn.html");
}elseif(!in_array('custodians', $_SESSION['page_ids'])){
    header("location: forbidden.php");
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    <title>Custodians</title>
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
                <div id="success-alert" class="success-alert row" align="center">Custodian has been added</div>
                <div id="deleted-alert" class="error row" align="center">Custodian have been deleted</div>
                <div id="update-alert" class="success-alert row" align="center">Custodian has been updated</div>
                <div id="network-error" class="error row" align="center">Network Error</div>
                <div id="checked-error" class="error row" align="center">No Item Checked</div>
            </div>
            <div class="col-md-12 page-head">
                Custodians
            </div>
            <div class="row">
                <div class="col-md-6 add-btn-box"><a href="#" data-toggle="modal" data-target="#addCustodianModal">
                        <button class="btn btn-primary btn-lg" value="">Add Custodian +</button>
                    </a></div>
                <form role="form" id="import-custodian-form" enctype="multipart/form-data">
                    <div class="col-md-3 form-group">
                        <input type="file" value="import" id="csv_file" class="form-control col-md-6" name="csv_file" required="">
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="submit" value="import csv" class="btn btn-success btn-md col-md-6" name="submit" id="submit">
                    </div>
                </form>
            </div>
            <div class="row">
                <button id="publish" class="btn btn-default btn-lg pull-right" value="">PUBLISH</button>
            </div>
            <form id="custodians-form" role="form" enctype="multipart/form-data">

                <div id="table-box" class="row" align="center">
                    <script src="js/searchfilter.js" type="text/javascript"></script>
                    <input type="text" id="search" onkeyup="Search()" placeholder="Search name" class="form-control">

                    <table id="table" cellpadding="0" cellspacing="0" border="0"
                           class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Web link</th>
                            <th>Tel</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $db_helper = new DatabaseHelper();
                        $db_helper->get_custodians();

                        ?>
                        </tbody>
                    </table>
                </div>
                <div id="delete"><input type="submit" value="Delete" class="btn btn-danger"
                                        onclick="return(confirm('Are you sure you want to delete these items'))"></div>
            </form>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
    <div class="row">
        <?php include_once 'imports/add_custodian.php'; ?>
        <?php include_once 'imports/edit_custodian.php'; ?>
    </div>
</div>
</body>
</html>