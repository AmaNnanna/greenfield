<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <base href="<?= domain ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title><?= $title ?></title>


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $adminassets ?>/images/favicon.png">


    <link href="<?= $adminassets ?>/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">


    <link href="<?= $adminassets ?>/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <link href="<?= $adminassets ?>/css/style-1.css" rel="stylesheet">
    <link href="<?= $adminassets ?>/css/css2-1?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">


    <link href="<?= $adminassets ?>/css/style.css" rel="stylesheet" type="text/css">

    <link href="<?= $adminassets ?>/css/css2.css?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet" type="text/css">


    <link href="<?= $adminassets ?>/vendor/bootstrap-select/css/bootstrap-select.min-8.css" rel="stylesheet" type="text/css">
    <link href="<?= $adminassets ?>/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
    <link href="<?= $adminassets ?>/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?= $adminassets ?>/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?= $adminassets ?>/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="<?= $adminassets ?>/vendor/pickadate/themes/default.css" rel="stylesheet" type="text/css">
    <link href="<?= $adminassets ?>/vendor/pickadate/themes/default.date.css" rel="stylesheet" type="text/css">
    <link href="<?= $adminassets ?>/icon/icon?family=Material+Icons" rel="stylesheet" type="text/css">


    <link href="<?= $adminassets ?>/css/style-10.css" rel="stylesheet" type="text/css">
    <link href="<?= $adminassets ?>/css/css2-10?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700 900&amp;display=swap" rel="stylesheet" type="text/css">

</head>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/" class="brand-logo">
                <img class="logo-abbr" src="<?= $adminassets ?>/images/logo.png" alt="">
                <img class="logo-compact" src="<?= $adminassets ?>/images/logo-text.png" alt="">
                <img class="brand-title" src="<?= $adminassets ?>/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--Header start-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                <?= $title ?> </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item">
                                <a href="/user/logout" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--Header end ti-comment-alt-->