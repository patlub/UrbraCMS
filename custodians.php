<?php require_once('classes/HomePage.php'); ?>
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
<?php include_once 'menu.php';?>
<script src="js/loadData.js"></script>
<div class="row">
    <div class="col-md-2"><a href="#" data-toggle="modal" data-target="#addCustodianModal"><button class="btn btn-primary btn-lg" value="">Add Custodian +</button></a></div>
</div>


<div class="loader"><!-- Place at bottom of page --></div>
    <div class="row">
        <?php include_once 'imports/add_custodian.php'; ?>
    </div>
    </div>
</body>
</html>