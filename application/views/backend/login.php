<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Login - - Web Admin Dinas Pendidikan dan Kebudayaan Kab. Pekalongan
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/backend/')?>img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/backend/')?>img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="<?=base_url('assets/backend/')?>img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/fa-regular.css">
        <!-- <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/fa-brands.css"> -->
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <span class="page-logo-text mr-1">Login Admin</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1" style="background: url(<?=base_url('assets/backend/')?>img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <div class="row">
                                <div class="col col-md-6 col-lg-7 hidden-sm-down">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <img height="200" src="<?=base_url('assets/backend/img/logo_pekalongan.png')?>">
                                        </div>
                                    </div>
                                    <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                                        Silahkan Login Terlebih Dahulu Untuk Melanjutkan ke Halaman Admin
                                        <!-- <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                            Presenting you with the next level of innovative UX design and engineering. The most modular toolkit available with over 600+ layout permutations. Experience the simplicity of SmartAdmin, everywhere you go!
                                        </small> -->
                                    </h2>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                        <i class="far fa-sign-in"></i> Secure login
                                    </h1>
                                    <div class="card p-4 rounded-plus bg-faded">
                                        <form method="post" id="js-login" action="<?=base_url('admin/login/check')?>">
                                            <div class="form-group">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" id="username" class="form-control form-control-lg" placeholder="Username" name="username" required>
                                                <div class="invalid-feedback">Username Belum Diisi</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password" class="form-control form-control-lg" placeholder="password" name="password" required>
                                                <div class="invalid-feedback">Maaf, Password Belum Diisi</div>
                                            </div>
                                            <div class="row no-gutters">
                                                <div class="col-lg-6 pl-lg-1 my-2">
                                                    <button id="js-login-btn" type="submit" class="btn btn-danger btn-block btn-lg"><i class="far fa-sign-in"></i> Secure login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                                2019 © &nbsp;<a href='<?=base_url('')?>' class='text-white opacity-40 fw-500' title='DINDIKBUD Kab. Pekalongan' target='_blank'>Dinas Pendidikan dan Kebudayaan Kab. Pekalongan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
        <script src="<?=base_url('assets/backend/')?>js/vendors.bundle.js"></script>
        <script src="<?=base_url('assets/backend/')?>js/app.bundle.js"></script>
        <script>
            $("#js-login-btn").click(function(event)
            {

                // Fetch form to apply custom Bootstrap validation
                var form = $("#js-login")

                if (form[0].checkValidity() === false)
                {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.addClass('was-validated');
                // Perform ajax submit here...
            });

        </script>
    </body>
</html>
