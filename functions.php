<?php
include_once 'time_out.php';
require_once 'classes/DatabaseHelper.php';
require_once 'classes/Administrator.php';

if (!$_SESSION['loggedIn']) {
    header("location:signIn.html");
}

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
    <script src="ckeditor/ckeditor.js"></script>
    <title>Edit Functions</title>
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
                <div class="success-alert row" align="center">Page has been added</div>
            </div>
            <div class="col-md-12 page-head">
                Functions
            </div>
            <div class="row">
                <div class="col-md-6 add-btn-box"><a href="#" data-toggle="modal" data-target="#addItemModal">
                        <button class="btn btn-primary btn-lg" value="">Add Item +</button>
                    </a></div>
            </div>
            <div class="row">
                <table id="table" cellpadding="0" cellspacing="0" border="0"
                       class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Items</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbh = new DatabaseHelper();
                    $dbh->fetch_functions_items();
                    ?>
                    </tbody>
                </table>
            </div>
            <form id="update-admin-form" role="form" enctype="multipart/form-data" method="post" action="php/update_funtions.php">
                <?php
                $dbh = new DatabaseHelper();
                $dbh->fetch_functions();
                ?>
                <div class="form-group col-md-3">
                    <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-success updatebtn">
                </div>
            </form>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
    <?php include_once 'imports/add_trustee_item.php' ?>
</div>
</body>
</html>