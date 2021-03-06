<?php
include_once 'time_out.php';
require_once 'classes/DatabaseHelper.php';
if(!$_SESSION['loggedIn']){
    header("location: signIn.html");
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
    <title>Add Page</title>
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
                <div id="exist-alert" class="error row" align="center">Page name already exists</div>
            </div>
            <form id="add-page-form" role="form" enctype="multipart/form-data">
                <div class="form-group col-md-4">
                    <label for="page-name">Page Name</label><input type="text" id="page-name" name="page-name"
                                                                class="form-control"
                                                                required>
                </div>
                <div class="form-group col-md-12">
                    <label for="content">Content</label><textarea id="content" name="content"
                                                                   class="form-control"></textarea>
                </div>
                <div class="form-group col-md-3">
                    <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-success pull-right">
                </div>
                <script>
                    // Replace the <textarea id="content"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace( 'content' );
                </script>
            </form>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
</div>
</body>
</html>