<?php 
$data['namaResto'] = $data['namaResto'];
$this -> bind('layout/home_header', $data); 
?>
    <!-- Content -->
    <div id="content">
        <!-- Section - Main -->
        <section class="section section-main section-main-2 bg-dark dark">
            <div id="section-main-2-slider" class="section-slider inner-controls">
                <!-- Slide -->
                <?php foreach($data['dataSlider'] as $ds) : ?>
                <div class="slide">
                    <div class="bg-image zooming"><img src="<?=STYLEBASE; ?>/home/img/slider/<?=$ds['img']; ?>" alt=""></div>
                    <div class="container v-center">
                    <h4 class="text-muted"><?=$ds['sub_header']; ?></h4>
                        <h1 class="display-2 mb-2"><?=$ds['title']; ?></h1>
                        <h4 class="text-muted mb-5"><?=$ds['sub_title']; ?></h4>
                        <a href="#!" class="btn btn-outline-primary btn-lg"><span><?=$ds['cap_button']; ?></span></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- Section - About -->
        <section class="section section-bg-edge" style="margin-top: 20px;">
            <div class="image left col-md-6">
                <div class="bg-image"><img src="<?=STYLEBASE; ?>/home/img/chef.jpg" alt=""></div>
            </div>
            <div class="container">
                <div class="col-lg-5 col-lg-offset-7 col-md-9 offset-md-6">
                    <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                    <h1>Cooking and service with love ..</h1>
                    <p class="lead text-muted mb-5">
                        Kami memberikan pelayanan & penyajian yang terbaik untuk anda
                    </p>
                    <div class="blockquotes">
                        <!-- Blockquote -->
                        <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                            <div class="blockquote-content">
                                <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                                <p>Makanannya enak, waiters ramah .. love it.. :-)</p>
                            </div>
                            <footer>
                                <img src="<?=STYLEBASE; ?>/home/img/cus.jpg" alt="">
                                <span class="name">Dinda Syafatira<span class="text-muted">, dinda8911@gmail.com</span></span>
                            </footer>
                        </blockquote>
                        <!-- Blockquote -->
                        <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                            <div class="blockquote-content dark">
                                <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                                <p>Tempat makan yang nyaman, instagrammable ...</p>
                            </div>
                            <footer>
                            <img src="<?=STYLEBASE; ?>/home/img/cus.jpg" alt="">    
                                <span class="name">Nurul Pratiwi<span class="text-muted">, nrlprtw@gmail.com</span></span>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section - Steps -->
        <section class="section section-extended center dark bg-dark" style="margin-top: 20px;">

            <div class="container bg-dark">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-shopping-cart"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2"><a href="#!">Pilih menu</a></h4>
                                <p class="text-muted mb-0">Silahkan pilih menu yang ada & beragam di resto kami.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2">Lakukan pemesanan</h4>
                                <p class="text-muted mb-0">Lakukan pemesanan, isi data dengan benar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2">Nikmati makananmu</h4>
                                <p class="text-muted mb-3">Yeah, makananmu sampai. Nikmati mudahnya pesanan di resto kami.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section - Offers -->
        <section class="section bg-light">
            <div class="container">
                <h1 class="text-center mb-6">Special offers</h1>
                <div class="carousel" data-slick='{"dots": true}'>
                    <?php foreach($data['dataPromo'] as $dp) : ?>
                    <!-- Special Offer -->
                    <div class="special-offer">
                        <img src="http://assets.suelo.pl/soup/img/photos/special-burger.jpg" alt="" class="special-offer-image">
                        <div class="special-offer-content">
                            <h2 class="mb-2"><?=$dp['nama']; ?></h2>
                            <h5 class="text-muted mb-5"><?=$dp['deks']; ?></h5>
                            <ul class="list-check text-lg mb-0">
                                <li>Expired on <?=$dp['tanggal_expired']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Section - Menu -->
        <section class="section pb-0">
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
            <?php foreach($data['dataMenu'] as $dm) : ?>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="#!">
                        <img src="<?=STYLEBASE; ?>/dasbor/img/menu/<?=$dm['pic']; ?>" style="filter: blur(5px);" alt="" class="image">
                        <h5 class="title" style="font-size:30px;color:#2d3436;font-weight:bold;"><?=$dm['nama']; ?></h5>
                    </a>
                </div>
            <?php endforeach; ?>
            </div>
        </section>
<?php 
$data['jsFile'] = 'home';
$this -> bind('layout/home_footer', $data); 
?>