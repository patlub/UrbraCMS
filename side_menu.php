<?php require_once 'classes/Page.php';
?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/side_menu.css" rel="stylesheet">
<div class="nav-side-menu">
    <div class="brand">URBRA</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
            <li class="active">
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i> Dashboard
                </a>
            </li>

            <li data-toggle="collapse" data-target="#service" class="collapsed" onclick="location.href = 'index.php'">
                <a href="#">
                    <i class="fa fa-globe fa-lg"></i> Home
                </a>
            </li>

            <li data-toggle="collapse" data-target="#trustees" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Trustees <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="trustees">
                <li class="active" onclick="location.href = 'corporate_trustees.php'"><a href="#">Corporate Trustees</a></li>
                <li class="active" onclick="location.href = 'individual_trustees.php'"><a href="#">Individual Trustees</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#service" class="collapsed" onclick="location.href = 'schemes.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Retirement Benefit Schemes</a>
            </li>

            <li data-toggle="collapse" data-target="#products" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Service Providers <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li class="active" onclick="location.href = 'administrators.php'"><a href="#">Administrators</a></li>
                <li class="active" onclick="location.href = 'custodians.php'"><a href="#">Custodians</a></li>
                <li class="active" onclick="location.href = 'fund_managers.php'"><a href="#">Fund Managers</a></li>

            </ul>


            <li data-toggle="collapse" data-target="#laws" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Laws <span class="arrow"></span></a>
            </li>

            <ul class="sub-menu collapse" id="laws">
                <li class="active" onclick="location.href = 'trustee_law.php'"><a href="#">Law of Trustees</a></li>
                <li class="active" onclick="location.href = 'scheme_law.php'"><a href="#">Law of Schemes</a></li>
                <li class="active" onclick="location.href = 'admin_law.php'"><a href="#">Law of Administrators</a></li>
                <li class="active" onclick="location.href = 'custodian_law.php'"><a href="#">Law of Custodians</a></li>
                <li class="active" onclick="location.href = 'fund_manager_law.php'"><a href="#">Law of Fund Managers</a></li>

            </ul>


            <li data-toggle="collapse" data-target="#service" class="collapsed"
                onclick="location.href = 'vacancies.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Vacancies</a>
            </li>
            <li data-toggle="collapse" data-target="#service" class="collapsed" onclick="location.href = 'tenders.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Tenders</a>
            </li>
            <li data-toggle="collapse" data-target="#service" class="collapsed" onclick="location.href = 'resources.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Resources</a>
            </li>
            <li data-toggle="collapse" data-target="#service" class="collapsed"
                onclick="location.href = 'articles.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Articles</a>
            </li>

            <li data-toggle="collapse" data-target="#service" class="collapsed" onclick="location.href = 'BoDs.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Board of Directors</a>
            </li>
            <li data-toggle="collapse" data-target="#service" class="collapsed"
                onclick="location.href = 'departments.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Departments</a>
            </li>
            <li data-toggle="collapse" data-target="#service" class="collapsed"
                onclick="location.href = 'workshops.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Workshops</a>
            </li>
            <li data-toggle="collapse" data-target="#service" class="collapsed"
                onclick="location.href = 'reports.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Reports</a>
            </li>
            <li data-toggle="collapse" data-target="#service" class="collapsed"
                onclick="location.href = 'faqs.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Faqs</a>
            </li>

            <li data-toggle="collapse" data-target="#about" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i> About <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="about">
                <li class="active" onclick="location.href = 'who_we_are.php'"><a href="#">Who we are</a></li>
                <li class="active" onclick="location.href = 'functions.php'"><a href="#">Functions</a></li>
            </ul>


            <li data-toggle="collapse" data-target="#media" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Media <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="media">
                <li class="active" onclick="location.href = 'imedia.php'"><a href="#">Internal Media</a></li>
                <li class="active" onclick="location.href = 'emedia.php'"><a href="#">External Media</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#pages" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i>Custom Pages <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="pages">
                <li class="active" onclick="location.href = 'pages.php'"><a href="#">Pages</a></li>

                <?php
                $page = new Page();
                $page->load_custom_pages_list();

                ?>
                <li class="active" onclick="location.href = 'add_page.php'"><a href="#">Add Page+</a></li>

            </ul>


            <li data-toggle="collapse" data-target="#users" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Users <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="users">
                <li class="active" onclick="location.href = 'users.php'"><a href="#">Users</a></li>
                <li class="active" onclick="location.href = 'change_pass.php'"><a href="#">Change Password</a></li>
            </ul>

            <li onclick="location.href = 'php/sign_out.php'">
                <a href="#">
                    <i class="fa fa-globe fa-lg"></i> Logout
                </a>
            </li>
            <li onclick="location.href = 'time_stamps.php'">
                <a href="#">
                    <i class="fa fa-globe fa-lg"></i> Time Stamps
                </a>
            </li>
            <li onclick="location.href = 'you_tube.php'">
                <a href="#">
                    <i class="fa fa-globe fa-lg"></i> YouTube Link
                </a>
            </li>
        </ul>
    </div>
</div>