<?php 
$data['namaResto'] = $data['namaResto'];
$this -> bind('layout/home_header_self_service', $data); 
?>
        <!-- Content -->
        <div id="content">
            <!-- Page Title -->
            <div class="page-title bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-4">
                            <h1 class="mb-0">Menu Resto</h1>
                            <h4 class="text-muted mb-0">Pilih berbagai menu yang ada di resto kami</h4>
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
                                    <div class="bg-image">
                                        <img src="http://assets.suelo.pl/soup/img/photos/menu-title-burgers.jpg" alt="<?=$km['nama'];?>">
                                    </div>
                                    <h2 class="title"><?=$km['nama'];?></h2>
                                </div>
                                <div class="menu-category-content padded">
                                    <div class="row gutters-sm">
                                        <?php foreach($menu as $mn) : ?>
                                        <div class="col-lg-4 col-6">
                                            <!-- Menu Item -->
                                            <div class="menu-item menu-grid-item">
                                                <img class="mb-4" src="<?=STYLEBASE; ?>/dasbor/img/menu/<?=$mn['pic']; ?>" alt="">
                                                <h6 class="mb-0"><?=$mn['nama']; ?></h6>
                                                <span class="text-muted text-sm"><?=$mn['deks']; ?></span>
                                                <div class="row align-items-center mt-4">
                                                    <div class="col-sm-6"><span class="text-md mr-4">
                                                        <span class="text-muted">Rp. <strong><?=number_format($mn['harga']); ?></strong></span>
                                                    </div>
                                                    <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                        <a href='#!' class="btn btn-outline-secondary btn-sm module module-cart" data-toggle="panel-cart" onclick='addMenu("<?=$mn['kd_menu']; ?>", "<?=$mn['nama']; ?>", "<?=$mn['harga']; ?>")'><span>Add</span></a>
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
<?php 
$data['jsFile'] = 'selfService';
$this -> bind('layout/home_footer_self_service', $data); 
?>