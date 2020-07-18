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
                            <a href="index.html">
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

        <!-- Header -->
        <header id="header-mobile" class="light">

            <div class="module module-nav-toggle">
                <a href="#" id="nav-toggle"
                    data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
            </div>

            <div class="module module-logo">
                <a href="index.html">
                    <img src="assets/img/logo-horizontal-dark.svg" alt="">
                </a>
            </div>



        </header>
        <!-- Header / End -->

        <!-- Content -->
        <div id="content">

            <!-- Page Title -->
            <div class="page-title bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-4">
                            <h1 class="mb-0">Menu Resto</h1>
                            <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="page-content" id='divMenu'>
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <!-- Menu Navigation -->
                            <nav id="menu-navigation" class="stick-to-content">
                                <ul class="nav nav-menu bg-dark dark">
                                    <?php foreach($data['kategoriMenu'] as $km) : ?>
                                    <li><a href="#<?=$km['nama'];?>"><?=$km['nama'];?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-9">
                            <?php foreach($data['kategoriMenu'] as $km) : 
                      $kdMenu = $km['id'];
                      $menu = $this -> state('homeData') -> getMenuWithKategori($kdMenu);  
                    ?>
                            <!-- Menu Category / Burgers -->
                            <div id="<?=$km['nama'];?>" class="menu-category">
                                <div class="menu-category-title">
                                    <div class="bg-image"><img
                                            src="http://assets.suelo.pl/soup/img/photos/menu-title-burgers.jpg" alt="">
                                    </div>
                                    <h2 class="title"><?=$km['nama'];?></h2>
                                </div>
                                <div class="menu-category-content padded">
                                    <div class="row gutters-sm">
                                        <?php foreach($menu as $mn) : ?>
                                        <div class="col-lg-4 col-6">
                                            <!-- Menu Item -->
                                            <div class="menu-item menu-grid-item">
                                                <img class="mb-4"
                                                    src="<?=STYLEBASE; ?>/dasbor/img/menu/<?=$mn['pic']; ?>" alt="">
                                                <h6 class="mb-0"><?=$mn['nama']; ?></h6>
                                                <span class="text-muted text-sm"><?=$mn['deks']; ?></span>
                                                <div class="row align-items-center mt-4">
                                                    <div class="col-sm-6"><span class="text-md mr-4"><span
                                                                class="text-muted">Rp.
                                                                <strong><?=number_format($mn['harga']); ?></strong></span>
                                                    </div>
                                                    <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                        <a href='#!'
                                                            class="btn btn-outline-secondary btn-sm module module-cart"
                                                            data-toggle="panel-cart"
                                                            onclick='addMenu("<?=$mn['kd_menu']; ?>", "<?=$mn['nama']; ?>", "<?=$mn['harga']; ?>")'><span>Add</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer id="footer" class="bg-dark dark">

                <div class="container">
                    <!-- Footer 1st Row -->
                    <div class="footer-first-row row">
                        <div class="col-lg-3 text-center">
                            <a href="index.html"><img src="assets/img/logo-light.svg" alt="" width="88"
                                    class="mt-5 mb-5"></a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <h5 class="text-muted">Promo terbaru</h5>
                            <ul class="list-posts">
                                <li>
                                    <a href="blog-post.html" class="title">How to create effective webdeisign?</a>
                                    <span class="date">February 14, 2015</span>
                                </li>
                                <li>
                                    <a href="blog-post.html" class="title">Awesome weekend in Polish mountains!</a>
                                    <span class="date">February 14, 2015</span>
                                </li>
                                <li>
                                    <a href="blog-post.html" class="title">How to create effective webdeisign?</a>
                                    <span class="date">February 14, 2015</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <h5 class="text-muted mb-3">Social Media</h5>
                            <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i
                                    class="fa fa-google"></i></a>
                            <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i
                                    class="fa fa-youtube"></i></a>
                            <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i
                                    class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    <!-- Footer 2nd Row -->
                    <div class="footer-second-row">
                        <span class="text-sm text-muted">NadhaResto <br> Develop By Haxorsprogramming</span>
                    </div>
                </div>

                <!-- Back To Top -->
                <button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

            </footer>
            <!-- Footer / End -->

        </div>
        <!-- Content / End -->

        <!-- Panel Cart -->
        <div id="panel-cart">
            <div class="panel-cart-container">
                <div class="panel-cart-title">
                    <h5 class="title">Pesanan anda</h5>
                    <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
                </div>
                <div class="panel-cart-content cart-details" id='divCartFinal'>
                    <table class="cart-table">
                        <tr v-for='li in listItem'>
                            <td class="title">
                                <span class="name"><a href="#!">{{li.nama}}</a></span>
                                <span class="caption">Qt x {{li.qt}}</span>
                            </td>
                            <td class="price">(@) Rp. {{ Number(li.hargaAt).toLocaleString() }}</td>
                            <td class="price">Total Rp. {{ Number(li.harga).toLocaleString() }}</td>
                            <td class="actions">
                                <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                            </td>
                        </tr>
                    </table>
                    <div style="padding:12px;">
                        <h5>Total <strong>Rp. {{ Number(totalHarga).toLocaleString() }}</strong></h5>
                    </div>
                </div>
            </div>
            <a href="#!" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go
                    to checkout</span></a>
        </div>

        <!-- Panel Mobile -->
        <nav id="panel-mobile">
            <div class="module module-logo bg-dark dark">
                <a href="#">
                    <img src="assets/img/logo-light.svg" alt="" width="88">
                </a>
                <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
            </div>
            <nav class="module module-navigation"></nav>
            <div class="module module-social">
                <h6 class="text-sm mb-3">Follow Us!</h6>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i
                        class="fa fa-facebook"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i
                        class="fa fa-instagram"></i></a>
            </div>
        </nav>

        <!-- Body Overlay -->
        <div id="body-overlay"></div>

    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- JS Core -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?=HOMEBASE; ?>ladun/home/dist/js/core.js"></script>
    <script src="<?=HOMEBASE; ?>ladun/home/js/selfService.js"></script>
</body>

</html>