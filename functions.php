<?php
require_once 'classes/DatabaseHelper.php';
session_start();

if(!$_SESSION['loggedIn']){
    header("location: signIn.html");
}

$dbh = new DatabaseHelper();
$functions = $dbh->fetch_functions();
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
            <form id="update-functions-form" role="form" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                    <label for="functions">Functions</label><textarea id="functions" name="functions"
                                                                   class="form-control"><?php echo $functions['functions'];?></textarea>
                </div>
                <div class="form-group col-md-3">
                    <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-success pull-right">
                </div>
                <script>
                    // Replace the <textarea id="content"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace( 'functions' );
                </script>
            </form>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
</div>
</body>
</html>