<?php
session_start()
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Project for hackNYUAD">
        <meta name="author" content="Team 13">

        <!-- App favicon -->
        <link rel="shortcut icon" href="res/images/logo.ico">
        <!-- App title -->
        <title>WashAD - Login</title>

        <!-- App css -->
        <link href="res/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="res/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="res/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="res/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="res/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="res/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="res/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="res/assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-purpleNYU" style="background-color: #57068c;">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page" style="padding-top: 0px;">

                            <div class="m-t-40 account-pages" style="background-color:white;">
                                <div class="text-center account-logo-box" style="background-color: white; padding-top: 30px">
				<img src="res/images/logo.gif" style="height: 80px">
                                    <h2 class="text-uppercase">
					    <span style="color: #6aaeeb;">Wash</span><span>AD</span>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content" style="padding-bottom: 100px;">
                                    <?php if (isset($_SESSION['loginMessage'])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?php
                                            echo $_SESSION['loginMessage'];
                                            unset($_SESSION['loginMessage']);
                                            ?>
                                        </div>
                                    <?php
                                    } ?>
                                    <?php if (isset($_SESSION['registerMessage'])) {
                                    ?>
                                        <div class="alert alert-<?php echo $_SESSION['registerMessageColor'] ?> alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?php
                                            echo $_SESSION['registerMessage'];
                                            unset($_SESSION['registerMessage']);
                                            ?>
                                        </div>
                                    <?php
                                    } ?>
                                    <form class="form-horizontal" action="verify.php" method="post">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" required placeholder="Net ID" name="net_id">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" required placeholder="Password" name="password">
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <a class="btn w-md btn-bordered btn-custom waves-effect waves-light" href="register.php" style="color: #57068c; margin-right: 5px;">Register</a>
                                                <button class="btn w-md btn-bordered btn-purple waves-effect waves-light" type="submit"  style="color: #57068c; margin-left: 5px;">Log In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->



                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="res/assets/js/jquery.min.js"></script>
        <script src="res/assets/js/bootstrap.min.js"></script>
        <script src="res/assets/js/detect.js"></script>
        <script src="res/assets/js/fastclick.js"></script>
        <script src="res/assets/js/jquery.blockUI.js"></script>
        <script src="res/assets/js/waves.js"></script>
        <script src="res/assets/js/jquery.slimscroll.js"></script>
        <script src="res/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="res/assets/js/jquery.core.js"></script>
        <script src="res/assets/js/jquery.app.js"></script>

    </body>
</html>
