<?php
require_once 'classes/DatabaseHelper.php';
session_start();

if (!$_SESSION['loggedIn']) {
    header("location:signgnIn.html");
}

$dbh = new DatabaseHelper();
$who_we_are = $dbh->fetch_who_we_are();

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
    <title>Edit Who we are</title>
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
            <form id="update-who-we-are-form" role="form" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                    <label for="summary">Summary</label><textarea id="summary" name="summary"
                                                                  class="form-control"><?php echo $who_we_are['summary']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="vision">Vision </label><textarea id="vision" name="vision"
                                                                 class="form-control"><?php echo $who_we_are['vision']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="mission">Mission</label><textarea id="mission" name="mission"
                                                                  class="form-control"><?php echo $who_we_are['mission']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="values">Values</label><textarea id="values" name="values"
                                                                class="form-control"><?php echo $who_we_are['values']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="sector_bg">Sector Background</label><textarea id="sector_bg" name="sectoe_bg"
                                                                              class="form-control"><?php echo $who_we_are['sector_bg']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="objectives">Objectives</label><textarea id="objectives" name="objectives"
                                                                        class="form-control"><?php echo $who_we_are['objectives']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="bg">Background</label><textarea id="bg" name="bg"
                                                                class="form-control"><?php echo $who_we_are['bg']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="mandate">Mandate</label><textarea id="mandate" name="manadate"
                                                                  class="form-control"><?php echo $who_we_are['mandate']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="powers">Powers</label><textarea id="powers" name="powers"
                                                                class="form-control"><?php echo $who_we_are['powers']; ?></textarea>
                </div>

                <div class="form-group col-md-3">
                    <input type="submit" name="submit" value="UPDATE" class="form-control btn btn-success pull-right">
                </div>
                <script>
                    // Replace the <textarea id="content"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('summary');
                    CKEDITOR.replace('vision');
                    CKEDITOR.replace('mission');
                    CKEDITOR.replace('values');
                    CKEDITOR.replace('sector_bg');
                    CKEDITOR.replace('objectives');
                    CKEDITOR.replace('bg');
                    CKEDITOR.replace('mandate');
                    CKEDITOR.replace('powers');
                </script>
            </form>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
</div>
</body>
</html>