<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SISTEM INFORMASI MINIMARKET</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo.ico">

    <link href="<?= base_url() ?>/assets/plugins/morris/morris.css" rel="stylesheet">

    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- jQuery  -->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/detect.js"></script>
    <script src="<?= base_url() ?>/assets/js/fastclick.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.blockUI.js"></script>
    <script src="<?= base_url() ?>/assets/js/waves.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.scrollTo.min.js"></script>

    <script src="<?= base_url() ?>/assets/plugins/skycons/skycons.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/morris/morris.min.js"></script>

    <script src="<?= base_url() ?>/assets/pages/dashborad.js"></script>

    <style>
        .navbar-custom {
            background-color: Light Blue;
        }
    </style>
</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

    <?= $this->rendersection('menu') ?>

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-inline float-right mb-0">
                            <!-- language-->
                            <li class="list-inline-item dropdown notification-list hide-phone">
                                
                            </li>
                            <li class="list-inline-item dropdown notification-list">
                                
                            </li>

                            <li class="list-inline-item dropdown notification-list">
                                
                            </li>

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user"
                                    data-toggle="dropdown"  role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <?= $u = (session()->get('username')); ?>
                                    <img src="<?php echo base_url() . '/gambar/' . $u . '.jpg' ?>" height="160" width="150">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= site_url('Login/logout') ?>"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left waves-light waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="hide-phone app-search">
                                <form role="search" class="">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                        </ul>

                        <div class="clearfix"></div>

                    </nav>

                </div>
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <?= $this->rendersection('isi') ?>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2024 Sistem Informasi Minimarket.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->




        <!-- App js -->
        <script src="<?= base_url() ?>/assets/js/app.js"></script>
        <script>
            /* BEGIN SVG WEATHER ICON */
            if (typeof Skycons !== 'undefined') {
                var icons = new Skycons(
                    { "color": "#fff" },
                    { "resizeClear": true }
                ),
                    list = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

                for (i = list.length; i--;)
                    icons.set(list[i], list[i]);
                icons.play();
            };

            // scroll

            $(document).ready(function () {

                $("#boxscroll").niceScroll({ cursorborder: "", cursorcolor: "#cecece", boxzoom: true });
                $("#boxscroll2").niceScroll({ cursorborder: "", cursorcolor: "#cecece", boxzoom: true });

            });
        </script>

</body>

</html>