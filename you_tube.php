<?php
include_once 'time_out.php';
require_once 'classes/DatabaseHelper.php';

if(!$_SESSION['loggedIn']){
    header("location: signIn.html");
}elseif(!in_array('you_tube', $_SESSION['page_ids'])){
    header("location: forbidden.php");
}

$dbh = new DatabaseHelper();
$link = $dbh->get_you_tube();

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
    <title>YouTube Link</title>
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
                YouTube link
            </div>
            <form id="you-tube-form" role="form" enctype="multipart/form-data" method="post" action="php/you_tube.php">
                <div class="row">
                <div class="form-group col-md-6">
                    <input type="hidden" name="id" value="">
                    <label for="link">Youtube Video Id</label><input type="text" id="link" name="link" value="<?php echo $link;?>"
                                                                class="form-control"
                                                                required>
                </div>
                </div>
                <div class="row">

                <div class="form-group col-md-3">
                    <input type="submit" name="submit" value="UPDATE" class="form-control btn btn-success pull-right">
                </div>
                    </div>
            </form>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
</div>
</body>
</html>