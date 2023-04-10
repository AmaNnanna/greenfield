<!DOCTYPE html>
<html>

<head>
    <base href="<?= domain ?>">
    <meta charset="utf-8">
    <title>Greenfield Executive Education | Homepage</title>
    <!-- Stylesheets -->
    <link href="<?= $assets ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?= $assets ?>/css/style.css" rel="stylesheet">
    <link href="<?= $assets ?>/css/responsive.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<?= $assets ?>/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?= $assets ?>/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body class="hidden-bar-wrapper">

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>
        <!-- End Preloader -->

        <!-- Header Style One -->
        <header class="main-header">

            <!-- Header Top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <!-- Top Left -->
                        <div class="top-left clearfix">
                            <div class="text"><span>Working time:</span> Monday to Friday 9 AM - 5 PM</div>
                        </div>

                        <!-- Top Right -->
                        <div class="top-right pull-right clearfix">
                            <!-- Social Box -->
                            <ul class="social-box">
                                <li><a href="https://www.facebook.com/profile.php?id=100089757549196&mibextid=ZbWKwL" class="fa fa-facebook-f"></a></li>
                                <li><a href="https://instagram.com/greenfieldexecedu?igshid=YmMyMTA2M2Y= " class="fa fa-instagram"></a></li>
                                <!-- <li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li> -->
                            </ul>
                            <div class="text">Call for free consultation: <a href="tel:+234 904 246 5972">+234 904 246 5972</a> | <a href="tel: +234 902 444 4626">+234 902 444 4626</a></div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Header Lower -->
            <div class="header-lower">
                <div class="auto-container clearfix">

                    <!-- Logo Box -->
                    <div class="pull-left logo-box">
                        <div class="logo"><a href="/"><img src="<?= $assets ?>/images/logo3.png" alt="" title=""></a></div>
                    </div>

                    <!-- Nav Outer -->
                    <div class="nav-outer clearfix">
                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/pages/about-us">About Us</a></li>
                                    <!-- <li><a href="/pages/courses">Courses</a></li> -->
                                    <li><a href="/pages/events">Events</a></li>
                                    <li><a href="/pages/gallery">Gallery</a></li>
                                    <!-- <li class="dropdown"><a href="#">Courses</a>
                                        <ul>
                                            <li><a href="courses.html">Courses</a></li>
                                            <li><a href="course-detail.html">Courses Detail</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- <li><a href="/pages/blog">Blog</a></li> -->
                                    <li><a href="/pages/contact-us">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div><!-- End Header Lower -->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="/" title=""><img src="<?= $assets ?>/images/logo-small32.png" alt="" title=""></a>
                    </div>
                    <!--Right Col-->
                    <div class="pull-right">

                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                        <!-- Main Menu End-->

                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

                    </div>
                </div>
            </div><!-- End Sticky Menu -->

            <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="/"><img src="<?= $assets ?>/images/logo-small2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->

        </header>