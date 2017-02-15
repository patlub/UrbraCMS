<?php
require_once 'classes/DatabaseHelper.php';
require_once 'classes/Trustee.php';
session_start();

if(!$_SESSION['loggedIn']){
    header("location:signgnIn.html");
}

$trustee = new Trustee();
$law = $trustee->fetch_trustee_law();

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
    <title>Edit Trustee Law</title>
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
            <form id="update-trustee-form" role="form" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                    <label for="application">Application and grant of licence of a trustee </label><textarea id="application" name="application"
                                                                   class="form-control"><?php echo $law['application']; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="refusal">Refusal of licence of a trustee  </label><textarea id="refusal" name="refusal"
                                                                                                                 class="form-control"><?php echo $law['refusal'];?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="restrict">Restrictions on licence of a trustee </label><textarea id="restrict" name="restrict"
                                                                                                class="form-control"><?php echo $law['restriction'];?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="validity">Validity of licence of a trustee  </label><textarea id="validity" name="validity"
                                                                                                     class="form-control"><?php echo $law['validity'];?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="revocation">Revocation of licence of a trustee </label><textarea id="revocation" name="revocation"
                                                                                                  class="form-control"><?php echo $law['revocation'];?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="function">Functions of an Administrator </label><textarea id="function" name="function"
                                                                                                     class="form-control"><?php echo $law['function'];?></textarea>
                </div>

                <div class="form-group col-md-3">
                    <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-success pull-right">
                </div>
                <script>
                    // Replace the <textarea id="content"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('application');
                    CKEDITOR.replace('refusal');
                    CKEDITOR.replace('restrict');
                    CKEDITOR.replace('validity');
                    CKEDITOR.replace('revocation');
                    CKEDITOR.replace('function');
                </script>
            </form>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
</div>
</body>
</html>