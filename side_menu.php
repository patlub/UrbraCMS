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
            <li data-toggle="collapse" data-target="#service" class="collapsed"
                onclick="location.href = 'trustees.php'">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Trustees</a>
            </li>
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

            <li>
                <a href="#">
                    <i class="fa fa-users fa-lg"></i> Users
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-globe fa-lg"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>