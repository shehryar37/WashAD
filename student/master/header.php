<?php session_start();
date_default_timezone_set("Asia/Dubai");
include_once("../../db.php");

if (!isset($_SESSION['student_id'])) {
    header("Location: ../../logout.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../res/assets/images/logo.gif">
    <!-- App title -->
    <title>Wash AD - <?php echo $page_title ?></title>

    <!-- -->
    <link href="../../res/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="../../res/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="../../res/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../../res/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="../../res/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="../../res/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../../res/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../res/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../res/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../res/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../res/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
    <link href="../../res/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../res/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../../res/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../res/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="../../res/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="../../res/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../../res/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../../res/assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../../res/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../res/plugins/switchery/switchery.min.css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="../../res/assets/js/modernizr.min.js"></script>
    <style>
        @media screen and (min-width: 1200px) {
            #notification-bar {
                width: 20vw;
            }
        }

        @media screen and (min-width: 1200px) {
            #notification-bar {
                width: 25vw;
            }
        }

        @media screen and (min-width: 768px) {
            #notification-bar {
                width: 30vw;
            }
        }

        @media screen and (max-width: 768px) {
            #notification-bar {
                width: 70vw;
            }
        }
    </style>
</head>

<body class="fixed-left-void">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <div class="topbar-left hidden-sm hidden-xs" style="background-color: #570683">
                <a href="../games/index.php" class="logo"><span style="color: #6aaeeb;">Wash<span style="color: white;">AD</span></span><i class="mdi mdi-layers"></i></a>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation" style="background-color: #570683">
                <div class="container">
                    <!-- Navbar-left -->
                    <ul class="nav navbar-nav navbar-left">
                        <li class="hidden-lg hidden-md">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>
                    <!-- Right(Notification) -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="dropdown-toggle right-menu-item" data-toggle="dropdown" aria-expanded="true">
                                <i class="mdi mdi-account"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                <li>
                                    <h5 style="font-weight: 300;">Hi, <?php echo $_SESSION['student_name']; ?></h5>
                                </li>
                                <li><a href="../settings/change-password.php"><i class="mdi mdi-key-variant m-r-5"></i> Change Password</a></li>
                                <li><a href="../../logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul> <!-- end navbar-right -->
                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu" style="position: fixed !important; background-color: #6aaeeb;">
            <div class="sidebar-inner slimscrollleft">
                <style>
                #sidebar-menu ul li a img {
                    display: inline-block;
                    font-size: 18px;
                    line-height: 17px;
                    margin-left: 3px;
                    margin-right: 15px;
                    text-align: center;
                    vertical-align: middle;
                }
                </style>
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title" style="color: white;">Navigation</li>
                        <li>
                            <a href="../bookings/your_bookings.php" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Your Bookings </span></a>
                        </li>
                        <li>
                            <a href="../washers/washers.php" class="waves-effect"><img src="../../res/assets/images/washer.gif" style="height: 20px;"><span> Washers </span></a>
                        </li>
                        <li>
                            <a href="../dryers/dryers.php" class="waves-effect"><img src="../../res/assets/images/dryer.gif" style="height: 20px;"><span> Dryers </span></a>
                        </li>
                        <li>
                            <a href="../baskets/baskets.php" class="waves-effect"><img src="../../res/assets/images/basket.gif" style="height: 20px;"><span> Baskets </span></a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title" style="color: #57068c;"><?php echo $page_title ?></h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="your_bookings.php">WashAD</a>
                                    </li>
                                    <li class="active">
                                        <?php echo $page_title ?>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>