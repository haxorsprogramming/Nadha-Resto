<!DOCTYPE html>
<html lang="en">
<!-- Header  -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" , shrink-to-fit="no">
    <title><?=SITENAME; ?></title>
    <!-- base:css -->
    <link rel="stylesheet" href="<?=STYLEBASE; ?>/login/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=STYLEBASE; ?>/login/vendors/base/vendor.bundle.base.css">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@700&family=Nunito:wght@600&display=swap"
        rel="stylesheet">
    <!-- core css -->
    <link rel="stylesheet" href="ladun/login/css/style.css">
    <!-- library css & js -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/izitoast/css/iziToast.min.css">
    <script src="https://demo.getstisla.com/assets/modules/izitoast/js/iziToast.min.js"></script>
</head>
<!-- Body  -->
<body style="font-family: 'Nunito', sans-serif;">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5" id='login-app'>
                                <div class="brand-logo" style='text-align:center;'>
                                    <img src="<?=STYLEBASE; ?>/<?=$data['pic']; ?>" alt="logo" style='width:200px; '>
                                    <h4 style="font-weight:bold;">Aplikasi Manajemen Restoran</h4>
                                </div>
                                <div style='text-align:center;'>
                                    <h6 class="font-weight-light">Harap masuk untuk melanjutkan.</h6>
                                    <div>
                                        <div class="pt-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" autofocus id="txtUsername" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" id="txtPassword" placeholder="Password">
                                            </div>
                                            <div class="mt-3">
                                                <a id='btnMasuk' v-on:click='klikSaya' class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#!">Masuk</a>
                                            </div>
                                            <div class="mt-2">
                                                <div style='padding-top:12px;'>
                                                    <h5 class="font-weight-light">2020 &copy; <a href='http://haxors.or.id' target='new'>Nadhamedia</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom js  -->
    <script>
        const server = "<?=HOMEBASE; ?>";
    </script>
    <script src="<?=STYLEBASE; ?>/login/js/login.js"></script>
    <script src="<?=STYLEBASE; ?>/login/js/template.js"></script>
    <script src="<?=STYLEBASE; ?>/login/js/page/auth-workers.js"></script>
</body>
</html>