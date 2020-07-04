<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>Nadha-Resto</title>

<!-- Favicons -->
<link rel="shortcut icon" href="<?=STYLEBASE; ?>/homepage/assets/img/favicon.png">
<link rel="apple-touch-icon" href="<?=STYLEBASE; ?>/homepage/assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?=STYLEBASE; ?>/homepage/assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?=STYLEBASE; ?>/homepage/assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?=STYLEBASE; ?>/homepage/assets/img/favicon_152x152.png">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">

<!-- CSS Core -->
<link rel="stylesheet" href="<?=STYLEBASE; ?>/homepage/dist/css/core.css" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="<?=STYLEBASE; ?>/homepage/dist/css/theme-beige.css" />

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
                        <a href="#!">
                            <img src="https://github.com/haxorsprogramming/Haxors-Contributors/raw/master/haxors_project/nadha_resto.png?raw=true" alt="" width="220">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">
                            <li class="has-dropdown">
                                <a href="#">Home</a>
                                <div class="dropdown-container">
                                    <ul>
                                        <li><a href="index.html">Home Basic</a></li>
                                        <li><a href="index-burgers.html">Home Burgers</a></li>
                                        <li><a href="index-slider.html">Home Fullwidth Slider</a></li>
                                        <li><a href="index-video.html">Home Video</a></li>
                                        <li><a href="index-fresh.html">Home Fresh <span class="badge badge-success">New</span></a></li>
                                        <li><a href="index-dark.html">Home Dark <span class="badge badge-success">New</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">About</a>
                                <div class="dropdown-container">
                                    <ul class="dropdown-mega">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-services.html">Services</a></li>
                                        <li><a href="page-gallery.html">Gallery</a></li>
                                        <li><a href="page-reviews.html">Reviews</a></li>
                                        <li><a href="page-faq.html">FAQ</a></li>
                                    </ul>
                                    <div class="dropdown-image">
                                        <img src="http://assets.suelo.pl/soup/img/photos/dropdown-about.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">Menu</a>
                                <div class="dropdown-container">
                                    <ul>
                                        <li class="has-dropdown">
                                            <a href="#">List</a>
                                            <ul>
                                                <li><a href="menu-list-navigation.html">Navigation</a></li>
                                                <li><a href="menu-list-collapse.html">Collapse</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="#">Grid</a>
                                            <ul>
                                                <li><a href="menu-grid-navigation.html">Navigation</a></li>
                                                <li><a href="menu-grid-collapse.html">Collapse</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="page-offers.html">Offers</a></li>
                            <li><a href="page-contact.html">Contact</a></li>
                            <li class="has-dropdown">
                                <a href="#">More</a>
                                <div class="dropdown-container">
                                    <ul class="dropdown-mega">
                                        <li><a href="page-offer-single.html">Offer single</a></li>
                                        <li><a href="page-product.html">Product</a></li>
                                        <li><a href="book-a-table.html">Book a table</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="confirmation.html">Confirmation</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-sidebar.html">Blog + Sidebar</a></li>
                                        <li><a href="blog-post.html">Blog Post</a></li>
                                        <li><a href="documentation/" target="_blank">Documentation</a></li>
                                    </ul>
                                    <div class="dropdown-image">
                                        <img src="http://assets.suelo.pl/soup/img/photos/dropdown-more.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="module left">
                        <a href="menu-list-navigation.html" class="btn btn-outline-secondary"><span>Order</span></a>
                        <a href="<?=HOMEBASE; ?>login" class="btn btn-outline-secondary"><span>Login</span></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification">0</span>
                        </span>
                        <span class="cart-value">$<span class="value">0.00</span></span>
                    </a>
                </div>
            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <a href="index.html">
                <img src="assets/img/logo-horizontal-dark.svg" alt="">
            </a>
        </div>

        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">0</span>
        </a>

    </header>
    <!-- Header / End -->

    <!-- Content -->
    <div id="content">

        <!-- Section - Main -->
        <section class="section section-main section-main-1 bg-light">

            <div class="container dark">
                <div class="slide-container">
                    <div id="section-main-1-carousel-image" class="image inner-controls">
                        <div class="slide"><div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/slider-pasta.jpg" alt=""></div></div>
                        <div class="slide"><div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/slider-burger.jpg" alt=""></div></div>
                        <div class="slide"><div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/slider-dessert.jpg" alt=""></div></div>
                    </div>
                    <div class="content dark">
                        <div id="section-main-1-carousel-content">
                            <div class="content-inner">
                                <h4 class="text-muted">New product!</h4>
                                <h1>Boscaiola Pasta</h1>
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary btn-lg" data-action="open-cart-modal" data-id="1"><span>Add to cart</span></button>
                                    <span class="price price-lg">from $9.98</span>
                                </div>
                            </div>
                            <div class="content-inner">
                                <h1>Get 10% off coupon</h1>
                                <h5 class="text-muted mb-5">and use it with your next order!</h5>
                                <a href="page-offers.html" class="btn btn-outline-primary btn-lg"><span>Get it now!</span></a>
                            </div>
                            <div class="content-inner">
                                <h1>Delicious Desserts</h1>
                                <h5 class="text-muted mb-5">Order it online even now!</h5>
                                <a href="menu-list-collapse.html" class="btn btn-outline-primary btn-lg"><span>Order now!</span></a>
                            </div>
                        </div>
                        <nav class="content-nav">
                            <a class="prev" href="#"><i class="ti ti-arrow-left"></i></a>
                            <a class="next" href="#"><i class="ti ti-arrow-right"></i></a>
                        </nav>
                    </div>
                </div>
            </div>

        </section>

        <!-- Section - About -->
        <section class="section section-bg-edge">

            <div class="image right col-md-6 offset-md-6">
                <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/bg-food.jpg" alt=""></div>
            </div>

            <div class="container">
                <div class="col-lg-5 col-md-9">
                    <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                    <h1>The best food in London!</h1>
                    <p class="lead text-muted mb-5">Donec a eros metus. Vivamus volutpat leo dictum risus ullamcorper condimentum. Cras sollicitudin varius condimentum. Praesent a dolor sem....</p>
                    <div class="blockquotes">
                        <!-- Blockquote -->
                        <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                            <div class="blockquote-content">
                                <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                                <p>It’ was amazing feeling for my belly!</p>
                            </div>
                            <footer>
                                <img src="http://assets.suelo.pl/soup/img/avatars/avatar02.jpg" alt="">
                                <span class="name">Mark Johnson<span class="text-muted">, Google</span></span>
                            </footer>
                        </blockquote>
                        <!-- Blockquote -->
                        <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                            <div class="blockquote-content dark">
                                <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                                <p>Great food and great atmosphere!</p>
                            </div>
                            <footer>
                                <img src="http://assets.suelo.pl/soup/img/avatars/avatar01.jpg" alt="">
                                <span class="name">Kate Hudson<span class="text-muted">, LinkedIn</span></span>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>

        </section>

        <!-- Section - Steps -->
        <section class="section section-extended right dark">

            <div class="container bg-dark">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-shopping-cart"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2"><a href="menu-list-collapse.html">Pick a dish</a></h4>
                                <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2">Make a payment</h4>
                                <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2">Recieve your food!</h4>
                                <p class="text-muted mb-3">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Section - Menu -->
        <section class="section pb-0 protrude">

            <div class="container">
                <h1 class="mb-6">Our menu</h1>
            </div>

            <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                "dots": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 1
                        }
                    },
                    {
                        "breakpoint": 690,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }'>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Burgers">
                        <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-burgers.jpg" alt="" class="image">
                        <h3 class="title">Burgers</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Pizza">
                        <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-pizza.jpg" alt="" class="image">
                        <h3 class="title">Pizza</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Sushi">
                        <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-sushi.jpg" alt="" class="image">
                        <h3 class="title">Sushi</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Pasta">
                        <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-pasta.jpg" alt="" class="image">
                        <h3 class="title">Pasta</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Desserts">
                        <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-dessert.jpg" alt="" class="image">
                        <h3 class="title">Desserts</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Drinks">
                        <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-drinks.jpg" alt="" class="image">
                        <h3 class="title">Drinks</h3>
                    </a>
                </div>
            </div>

        </section>

        <!-- Section - Offers -->
        <section class="section bg-light">

            <div class="container">
                <h1 class="text-center mb-6">Special offers</h1>
                <div class="carousel" data-slick='{"dots": true}'>
                    <!-- Special Offer -->
                    <div class="special-offer">
                        <img src="http://assets.suelo.pl/soup/img/photos/special-burger.jpg" alt="" class="special-offer-image">
                        <div class="special-offer-content">
                            <h2 class="mb-2">Free Burger</h2>
                            <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                            <ul class="list-check text-lg mb-0">
                                <li>Only on Tuesdays</li>
                                <li class="false">Order higher that $40</li>
                                <li>Unless one burger ordered</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Special Offer -->
                    <div class="special-offer">
                        <img src="http://assets.suelo.pl/soup/img/photos/special-pizza.jpg" alt="" class="special-offer-image">
                        <div class="special-offer-content">
                            <h2 class="mb-2">Free Small Pizza</h2>
                            <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                            <ul class="list-check text-lg mb-0">
                                <li>Only on Weekends</li>
                                <li class="false">Order higher that $40</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Special Offer -->
                    <div class="special-offer">
                        <img src="http://assets.suelo.pl/soup/img/photos/special-dish.jpg" alt="" class="special-offer-image">
                        <div class="special-offer-content">
                            <h2 class="mb-2">Chip Friday</h2>
                            <h5 class="text-muted mb-5">10% Off for all dishes!</h5>
                            <ul class="list-check text-lg mb-0">
                                <li>Only on Friday</li>
                                <li>All products</li>
                                <li>Online order</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Section -->
        <section class="section section-lg dark bg-dark">

            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="http://assets.suelo.pl/soup/img/photos/bg-croissant.jpg" alt=""></div>

            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="mb-3">Check our promo video!</h2>
                        <h5 class="text-muted">Book a table even right now or make an online order!</h5>
                        <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo" data-video="https://www.youtube.com/embed/uVju5--RqtY"></button>
                    </div>
                </div>
            </div>

        </section>

        <!-- Footer -->
        <footer id="footer" class="bg-dark dark">

            <div class="container">
                <!-- Footer 1st Row -->
                <div class="footer-first-row row">
                    <div class="col-lg-3 text-center">
                        <a href="index.html"><img src="assets/img/logo-light.svg" alt="" width="88" class="mt-5 mb-5"></a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-muted">Latest news</h5>
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
                        <h5 class="text-muted">Subscribe Us!</h5>
                        <!-- MailChimp Form -->
                        <form action="//suelo.us12.list-manage.com/subscribe/post-json?u=ed47dbfe167d906f2bc46a01b&amp;id=24ac8a22ad" id="sign-up-form" class="sign-up-form validate-form mb-5" method="POST">
                            <div class="input-group">
                                <input name="EMAIL" id="mce-EMAIL" type="email" class="form-control" placeholder="Tap your e-mail..." required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-submit" type="submit">
                                        <span class="description">Subscribe</span>
                                        <span class="success">
                                            <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
                                        </span>
                                        <span class="error">Try again...</span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <h5 class="text-muted mb-3">Social Media</h5>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!-- Footer 2nd Row -->
                <div class="footer-second-row">
                    <span class="text-muted">Copyright Soup 2020©. Made with love by Suelo.</span>
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
                <h5 class="title">Your Cart</h5>
                <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
            </div>
            <div class="panel-cart-content cart-details">
                <table class="cart-table">
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Beef Burger</a></span>
                            <span class="caption text-muted">Large (500g)</span>
                        </td>
                        <td class="price">$9.00</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Extra Burger</a></span>
                            <span class="caption text-muted">Small (200g)</span>
                        </td>
                        <td class="price text-success">$9.00</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                </table>
                <div class="cart-summary">
                    <div class="row">
                        <div class="col-7 text-right text-muted">Order total:</div>
                        <div class="col-5"><strong>$<span class="cart-products-total">0.00</span></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-7 text-right text-muted">Devliery:</div>
                        <div class="col-5"><strong>$<span class="cart-delivery">0.00</span></strong></div>
                    </div>
                    <hr class="hr-sm">
                    <div class="row text-lg">
                        <div class="col-7 text-right text-muted">Total:</div>
                        <div class="col-5"><strong>$<span class="cart-total">0.00</span></strong></div>
                    </div>
                </div>
                <div class="cart-empty">
                    <i class="ti ti-shopping-cart"></i>
                    <p>Your cart is empty...</p>
                </div>
            </div>
        </div>
        <a href="checkout.html" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
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
            <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </nav>

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

</div>

<!-- Modal / Product -->
<div class="modal fade product-modal" id="product-modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify your dish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i></button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-1 product-modal-name">Boscaiola Pasta</h6>
                        <span class="text-muted product-modal-ingredients">Pasta, Cheese, Tomatoes, Olives</span>
                    </div>
                    <div class="col-3 text-lg text-right">$<span class="product-modal-price">9.00</span></div>
                </div>
            </div>
            <div class="modal-body panel-details-container">
                <!-- Panel Details / Size -->
                <div class="panel-details panel-details-size">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-sizes-list" data-toggle="collapse">Size</a>
                    </h5>
                    <div id="panel-details-sizes-list" class="collapse show">
                        <div class="panel-details-content">
                            <div class="product-modal-sizes">
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input" checked>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Small - 100g ($9.99)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Medium - 200g ($14.99)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Large - 350g ($21.99)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Additions -->
                <div class="panel-details panel-details-additions">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-additions-content" data-toggle="collapse">Additions</a>
                    </h5>
                    <div id="panel-details-additions-content" class="collapse">
                        <div class="panel-details-content">
                            <!-- Additions List -->
                            <div class="row product-modal-additions">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tomato ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Ham ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Chicken ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Cheese($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Bacon ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Other -->
                <div class="panel-details panel-details-form">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_other" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-other" data-toggle="collapse">Other</a>
                    </h5>
                    <div id="panel-details-other" class="collapse">
                        <form action="#">
                            <textarea cols="30" rows="4" class="form-control" placeholder="Put this any other informations..."></textarea>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="add-to-cart"><span>Add to Cart</span></button>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="update-cart"><span>Update</span></button>
        </div>
    </div>
</div>

<!-- Video Modal / Demo -->
<div class="modal modal-video fade" id="modalVideo" role="dialog">
    <button class="close" data-dismiss="modal"><i class="ti ti-close"></i></button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <iframe height="500"></iframe>
        </div>
    </div>
</div>

<!-- Modal / COVID -->
<div class="modal fade" id="covid-modal" role="dialog" data-timeout="1000" data-set-cookie="covid-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-covid.jpg" alt=""></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i></button>
            </div>
            <div class="modal-body">
                <h3>We are COVID-19 safe!</h3>
                <p>In sed massa tempus, dapibus est pulvinar, pellentesque tellus. Donec ultricies magna nec mauris ornare venenatis. Duis fermentum est diam, in molestie tellus venenatis id. In ut efficitur mi, vel hendrerit libero. Phasellus ac vulputate lorem, pharetra tempor leo. Fusce eu dui libero.</p>
                <button class="btn btn-secondary" data-dismiss="modal"><span>Ok, thanks!</span></button>
            </div>
        </div>
    </div>
</div>

<!-- Cookies Bar -->
<div id="cookies-bar" class="body-bar cookies-bar">
    <div class="body-bar-container container">
        <div class="body-bar-text">
            <h4 class="mb-2">Cookies & GDPR</h4>
            <p>This is a sample Cookies / GDPR information. You can use it easily on your site and even add link to <a href="#">Privacy Policy</a>.</p>
        </div>
        <div class="body-bar-action">
            <button class="btn btn-primary" data-accept="cookies"><span>Accept</span></button>
        </div>
    </div>
</div>

<!-- JS Core -->
<script src="<?=STYLEBASE; ?>/homepage/dist/js/core.js"></script>

</body>

</html>
