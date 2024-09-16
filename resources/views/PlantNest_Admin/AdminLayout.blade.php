<!DOCTYPE html>
<html>

<!-- Mirrored from polygons.space/modern/Source/admin1/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Aug 2023 05:44:53 GMT -->

<head>

    <!-- Title -->
    <title>@yield('title2')</title>

    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="PlantNest_admin/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet" />
    <link href="PlantNest_admin/assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet" />
    <link href="PlantNest_admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="PlantNest_admin/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="PlantNest_admin/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" />
    <link href="PlantNest_admin/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
        type="text/css" />
    <link href="PlantNest_admin/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css" />
    <link href="PlantNest_admin/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="PlantNest_admin/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css" />
    <link href="PlantNest_admin/assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css" />
    <!-- icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- icon link end -->

    <!-- Theme Styles -->
    <link href="PlantNest_admin/assets/css/modern.min.css" rel="stylesheet" type="text/css" />
    <link href="PlantNest_admin/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css" />
    <link href="PlantNest_admin/assets/css/custom.css" rel="stylesheet" type="text/css" />

    <script src="PlantNest_admin/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="PlantNest_admin/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body class="page-header-fixed">
    <div class="overlay"></div>
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
        <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right"
                id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
        <div class="slimscroll chat">
            <div class="chat-item chat-item-left">

                <div class="chat-message">
                    Hi There!
                </div>
            </div>
            <div class="chat-item chat-item-right">
                <div class="chat-message">
                    Hi! How are you?
                </div>
            </div>
            <div class="chat-item chat-item-left">
                <div class="chat-image">
                    <img src="../PlantNest_admin/assets/images/avatar2.png" alt="">
                </div>
                <div class="chat-message">
                    Fine! do you like my project?
                </div>
            </div>
            <div class="chat-item chat-item-right">
                <div class="chat-message">
                    Yes, It's clean and creative, good job!
                </div>
            </div>
            <div class="chat-item chat-item-left">
                <div class="chat-image">
                    <img src="../PlantNest_admin/assets/images/avatar2.png" alt="">
                </div>
                <div class="chat-message">
                    Thanks, I tried!
                </div>
            </div>
            <div class="chat-item chat-item-right">
                <div class="chat-message">
                    Good luck with your sales!
                </div>
            </div>
        </div>
        <div class="chat-write">
            <form class="form-horizontal" action="javascript:void(0);">
                <input type="text" class="form-control" placeholder="Say something">
            </form>
        </div>
    </nav>
    <div class="menu-wrap">
        <nav class="profile-menu">
            <div class="profile"><img src="../PlantNest_admin/assets/images/usericon.png" width="60"
                    alt="David Green" /><span>{{session('sessionusername')}}</span></div>
            <div class="profile-menu-list">
                <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>
                <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>
                <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
    </div>
    <form class="search-form" action="#" method="GET">
        <div class="input-group">
            <input type="text" name="search" class="form-control search-input" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i
                        class="fa fa-times"></i></button>
            </span>
        </div><!-- Input Group -->
    </form><!-- Search Form -->
    <main class="page-content content-wrap">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box">
                    <center>
                        <a href="#" class=" ml-3" style=" color:white; font-size:2.2rem; margin-top:-80px;"><img src=""
                                alt="">GreenScape</a>

                    </center>
                </div><!-- Logo Box -->
                <div class="search-button">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                            class="fa fa-search"></i></a>
                </div>
                <div class="topmenu-outer">
                    <div class="top-menu">


                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="javascript:void(0);"
                                    class="waves-effect waves-button waves-classic sidebar-toggle"><i
                                        class="fa fa-bars"></i></a>
                            </li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <!--  -->



                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                                    data-toggle="dropdown">
                                    <span class="user-name">{{session('sessionusername')}}<i
                                            class="fa fa-angle-down"></i></span>
                                    <img class="img-circle avatar" src="../PlantNest_admin/assets/images/usericon.png"
                                        width="40" height="40" alt="">
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li role="presentation"><a class="dropdown-item" href="/logout"><i
                                                class="fa fa-sign-out m-r-xs"></i>Logout</a>
                                    </li>
                                </ul>
                            </li>

                        </ul><!-- Nav -->
                    </div><!-- Top Menu -->
                </div>
            </div>
        </div><!-- Navbar -->
        <div class="page-sidebar sidebar">
            <div class="page-sidebar-inner slimscroll">
                <div class="sidebar-header">
                    <div class="sidebar-profile">
                        <a href="javascript:void(0);" id="profile-menu-link">
                            <div class="sidebar-profile-image">
                                <img src="../PlantNest_admin/assets/images/usericon.png"
                                    class="img-circle img-responsive" alt="">
                            </div>
                            <div class="sidebar-profile-details">
                                <span>{{session('sessionusername')}}<br></span>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- side bar dashboard -->
                <ul class="menu accordion-menu">

                    <li><a href="/admindashboard" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-home"></span>
                            <p>Dashboard</p>
                        </a></li>
                    <li><a href="/userinfo" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-file"></span>
                            <p>Login fetch</p>
                        </a></li>
                    <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-list"></span>
                            <p>products insert</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="/fetchcategory">Categeroies</a></li>
                            <li><a href="/fetchproduct">Products</a></li>

                        </ul>
                    </li>

                    <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-user"></span>
                            <p>Users info</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="/contactdetails">contact users</a></li>
                            <li><a href="review">Reviews</a></li>
                            <li><a href="feedback_fetch">Feedback</a></li>

                        </ul>
                    </li>

                    <li><a href="/orders" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-shopping-cart"></span>
                            <p>Orders</p>
                        </a></li>


            </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->



        <div class="page-inner">

            <div id="main-wrapper">

                @yield('content')

            </div>
        </div><!-- Main Wrapper -->

        <div class="page-footer">
            <p class="no-s">2024 &copy; Modern by PlantNest.</p>
        </div>
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>


        <!-- Javascripts -->
        <script src="PlantNest_admin/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="PlantNest_admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="PlantNest_admin/assets/plugins/pace-master/pace.min.js"></script>
        <script src="PlantNest_admin/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="PlantNest_admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="PlantNest_admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="PlantNest_admin/assets/plugins/switchery/switchery.min.js"></script>
        <script src="PlantNest_admin/assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="PlantNest_admin/assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="PlantNest_admin/assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="PlantNest_admin/assets/plugins/waves/waves.min.js"></script>
        <script src="PlantNest_admin/assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="PlantNest_admin/assets/js/modern.min.js"></script>
        <script src="PlantNest_admin/assets/js/pages/inbox.js"></script>

</body>

<!-- Mirrored from polygons.space/modern/Source/admin1/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Aug 2023 05:44:56 GMT -->

</html>