<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Title -->
    <title><?=$data['namaResto']; ?> - Order Menu</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap"
        rel="stylesheet">
    <!-- CSS Core -->
    <link rel="stylesheet" href="<?=HOMEBASE; ?>ladun/home/dist/css/core.css" />
    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="<?=HOMEBASE; ?>ladun/home/dist/css/theme-beige.css" />
    <!-- Vue JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <!-- Body Wrapper -->
    <div id="body-wrapper" class="animsition">
        <!-- Header -->
        <header id="header" class="light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Logo -->
                        <div class="module module-logo dark">
                            <a href="<?=HOMEBASE; ?>home">
                                <img src="<?=HOMEBASE; ?>ladun/logo.png" alt="" style="width: 200px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <!-- Navigation -->
                        <nav class="module module-navigation left mr-4">
                            <ul id="nav-main" class="nav nav-main">
                                <li><a href="<?=HOMEBASE; ?>">Home</a></li>
                                <li><a href="#!">About Resto</a></li>
                                <li><a href="#!">Menu Resto</a></li>
                                <li><a href="#!">Gallery Resto</a></li>
                            </ul>
                        </nav>
                        <div class="module left">
                            <a href="<?=HOMEBASE;?>home/selfservice"
                                class="btn btn-outline-secondary"><span>Order</span></a>
                            <a href="<?=HOMEBASE;?>login" class="btn btn-outline-secondary"><span>Login</span></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="#!" class="module module-cart right" data-toggle="panel-cart">
                            <span class="cart-icon">
                                <i class="ti ti-shopping-cart"></i>
                                <span class="notification">0</span>
                            </span>
                            <span class="cart-value">Rp. <span class="value" id='capJumlah'></span></span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header / End -->
        <!-- Header mobile-->
        <header id="header-mobile" class="light">
            <div class="module module-nav-toggle">
                <a href="#" id="nav-toggle" data-toggle="panel-mobile">
                    <span></span><span></span><span></span><span></span>
                </a>
            </div>
            <div class="module module-logo">
                <a href="index.html">
                    <img src="<?=HOMEBASE; ?>ladun/logo.png" alt="">
                </a>
                <a href="#" class="module module-cart" data-toggle="panel-cart">
                    <i class="ti ti-shopping-cart"></i>
                    <span class="notification" data-cart-qty="" style="display: none;">2</span>
                </a>
            </div>
        </header>
        <!-- Header / End -->