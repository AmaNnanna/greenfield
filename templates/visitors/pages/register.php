<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="utf-8">
    <base href="<?= domain ?>">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>AULmed | Registration Page</title>
    <meta name="description" content="Admin login page for AULmed">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $adminassets ?>/images/favicon.png">
    <link href="<?= $adminassets ?>/css/style.css" rel="stylesheet">
    <link href="<?= $adminassets ?>/css/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="/"><img src="<?= $adminassets ?>/images/logo-full.png" alt=""></a>
                                    </div>
                                    <h5><?= $SELF->Toast(); ?></h5>
                                    <h4 class="text-center mb-4 text-white">Create Your Account</h4>
                                    <form action="/user_register" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Your Full Name</strong></label>
                                            <input type="text" class="form-control" name="fullName">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Your Email</strong></label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Create a Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Create Account</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="/visitors/pages/login">Sign in Instead</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $adminassets ?>/global/global.min.js" type="text/javascript"></script>
    <script src="<?= $adminassets ?>/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?= $adminassets ?>/js/custom.js" type="text/javascript"></script>
    <script src="<?= $adminassets ?>/js/deznav-init.js" type="text/javascript"></script>

    <script id="DZScript" src="<?= $adminassets ?>/w3-global.js?btn_dir=right"></script>
</body>

</html>