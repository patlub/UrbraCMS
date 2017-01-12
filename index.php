<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <title>URBRA Control Panel</title>

</head>
<body>
<div class="container-fluid">
    <?php include_once 'menu.php'; ?>
    <div class="row">
        <a href="home.php">
            <div id="home-box" class="col-md-2 col-sm-2">
                <img src="img/home.png" width="50" height="70" style="margin-top: 90%;margin-left: 35%">

                <p class="tab-text" style="color: #ffffff">Home Page</p>
            </div>
        </a>

        <div class="col-md-5 col-sm-5 box-shell">
            <a href="#" data-toggle="modal" data-target="#contactModal">
                <div id="serv-pro-box" class="col-md-12 col-sm-12">
                    <img src="img/service-pro.png">

                    <p class="">Service Providers</p>
                </div>
            </a>
            <a href="#">
                <div id="trustees-box" class="col-md-6 col-sm-6 short-tab-box">
                    <img src="img/trustee.png">

                    <p class="tab-text">Trustees</p>
                </div>
            </a>
            <a href="#">
                <div id="rbs-box" class="col-md-6 col-sm-6 short-tab-box">
                    <img src="img/scheme.png">

                    <p class="tab-text">Retirement Benefit Schemes</p>
                </div>
            </a>
        </div>

        <div class="col-md-5 col-sm-5 box-shell">
            <a href="#">
                <div id="resource-box" class="col-md-6 col-sm-6 short-tab-box">
                    <img src="img/download.png">

                    <p class="tab-text">Downloads</p>
                </div>
            </a>
            <a href="#">
                <div id="vacancy-box" class="col-md-6 col-sm-6 short-tab-box">
                    <img src="img/vacancy.png">

                    <p class="tab-text">Vacancies</p>
                </div>
            </a>
        </div>
        <div class="col-md-5 col-sm-5 box-shell">
            <a href="#">
                <div id="tenders-box" class="col-md-6 col-sm-6 short-tab-box">
                    <img src="img/tender.png">

                    <p class="tab-text">Tenders</p>
                </div>
            </a>
            <a href="#">
                <div id="about-box" class="col-md-6 col-sm-6 short-tab-box">
                    <img src="img/about.png">

                    <p class="tab-text">About Us</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <?php include_once 'imports/serv_providers_modal.php'; ?>
    </div>
</div>
</body>
</html>