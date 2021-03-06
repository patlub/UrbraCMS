<?php
include_once 'time_out.php';
require_once('classes/HomePage.php');
require_once('classes/DatabaseHelper.php');
if(!$_SESSION['loggedIn']){
    header("location: signIn.html");
}elseif(!in_array('index', $_SESSION['page_ids'])){
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
    <title>Home Page</title>
</head>
<body>
<div class="container-fluid">
<?php //include_once 'menu.php'; ?>
<script src="js/loadData.js"></script>
<div class="row">
<div class="col-md-3 side-menu">
    <?php include_once 'side_menu.php'; ?>
</div>
<div class="col-md-9">
<div class="col-md-12">
    <?php include_once 'menu.php'; ?>
    <div id="update-alert" class="success-alert row" align="center">Slide Image has been updated</div>
    <div id="deleted-alert" class=" row" align="center">Slides have been deleted</div>
    <div id="preview-alert" class="success-alert row" align="center">Preview Updated</div>
    <div class="error row" align="center">Network Error</div>
</div>
<div class="row title-box">SlideShow Preview</div>

<div id="carousel-box" class="row" align="center" style="">
    <div class="col-md-8">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol id="indicators" class="carousel-indicators"></ol>
            <!-- Wrapper for slides -->
            <div id="carousel-inner" class="carousel-inner" role="listbox"></div>
        </div>
    </div>
</div>

<div class="row title-box">SlideShow Section</div>
<div class="row">
    <form id="add-slide-form" role="form" enctype="multipart/form-data">
        <div class="form-group col-md-2">
            <label for="slideimage">Slideshow Image</label>
            <input type="file" id="slideimage" name="slideimage" class="form-control" required>
        </div>
        <div class="form-group col-md-2">
            <label for="caption">Caption</label><input type="text" id="caption" name="caption"
                                                       class="form-control" required>
        </div>
        <div class="form-group col-md-2">
            <label for="link">Web Link</label><input type="text" id="link" name="link"
                                                     class="form-control">
        </div>
        <div class="form-group col-md-2" style="margin-top: 2%;">
            <input id="add-slide" type="submit" name="add-slide" value="ADD SLIDE+"
                   class="form-control btn btn-primary">
        </div>
        <div class="form-group col-md-2" style="margin-top: 2%;">
            <input id="update-slide" type="button" name="submit" value="PUBLISH" class="form-control btn btn-success">
        </div>
    </form>
</div>
<form id="slide-form" role="form" enctype="multipart/form-data" method="post">
    <div id="table-box" class="row" align="center">

        <table id="table" cellpadding="0" cellspacing="0" border="0"
               class="table table-striped table-bordered">
            <thead>
            <tr>
                <th></th>
                <th>Caption</th>
                <th>Link</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $db_helper = new DatabaseHelper();
            $db_helper->get_slides();

            ?>
            </tbody>
        </table>
    </div>
    <div id="delete"><input type="submit" value="Delete" class="btn btn-danger"></div>
</form>

<div class="row title-box">Lower Section</div>

<div id="lower-section" class="col-md-12">

    <div class="col-md-6">
        <div class="row sec-box">
            <div class="sec-image" align="center">
                <img id="sec_image1" src="" class="service-image img-responsive">
            </div>

            <div id="sec_head1" class="sec-head"></div>
            <div id="sec_text1" class="sec_text"></div>
            <div class="row service-btn">
                <input id="sec_btn1" type="button" value="" class="btn btn-warning btn-lg">
            </div>
        </div>
        <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sectionOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                           aria-expanded="true" aria-controls="collapseOne">
                            Edit Section 1
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="headingOne">
                    <div class="panel-body">
                        <form id="update_serv_sec1" role="form" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="sub1">Heading</label>
                                <input type="text" id="sub1" name="sub" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="sub-text1">Text</label>
                                <textarea id="sub-text1" name="sub-text" class="form-control" required></textarea>
                                <input type="hidden" value="1" name="position" id="position">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" id="upsection" name="upsection" value="Update Section"
                                       class="form-control btn btn-success"
                                       required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row sec-box">
            <div class="sec-image" align="center">
                <img id="sec_image3" src="" class="service-image img-responsive">
            </div>

            <div id="sec_head3" class="sec-head"></div>
            <div id="sec_text3" class="sec_text"></div>
            <div class="row service-btn">
                <input id="sec_btn3" type="button" value="" class="btn btn-warning btn-lg">
            </div>
        </div>
        <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sectionOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                           aria-expanded="true" aria-controls="collapseThree">
                            Edit Section 3
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="sectionThree">
                    <div class="panel-body">
                        <form id="update_serv_sec3" role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="sub3">Heading</label>
                                <input type="text" id="sub3" name="sub" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="sub-text3">Text</label>
                                <textarea id="sub-text3" name="sub-text" class="form-control" required></textarea>
                                <input type="hidden" value="3" name="position" id="position">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" id="upsection" name="upsection" value="Update Section"
                                       class="form-control btn btn-success"
                                       required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="row">
    <?php include_once 'imports/add_slide.php'; ?>
    <?php include_once 'imports/edit_slide.php'; ?>
</div>
</div>
<div class="loader"><!-- Place at bottom of page --></div>
</body>
</html>