<?php 
    $data['namaResto'] = $data['namaResto'];
    $this -> bind('layout/home_header', $data); 
?>

<!-- Content -->
<div id="content">

    <!-- Section -->
    <section class="section bg-light">
        <div class="container" id="divCekPesanan">
            <div class="row row justify-content-center">
                <div class="utility-box" style="width: 400px;">
                    <div class="utility-box-title bg-dark dark">
                        <div class="bg-image"
                            style="background-image: url(&quot;http://assets.suelo.pl/soup/img/photos/modal-review.jpg&quot;);">
                            <img src="http://assets.suelo.pl/soup/img/photos/modal-review.jpg" alt=""
                                style="display: none;"></div>
                        <div>
                            <span class="icon icon-primary"><i class="ti ti-bookmark-alt"></i></span>
                            <h4 class="mb-0">Cek pesanan</h4>
                            <p class="lead text-muted mb-0">Details about your reservation.</p>
                        </div>
                    </div>
                    <div class="utility-box-content">
                        <div class="form-group">
                            <label>Kode pemesanan </label>
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                    </div>
                    <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit">
                        <span class="description">Cek pesanan</span>
                    </button>

                </div>
            </div>
        </div>
    </section>

</div>

<?php 
    $data['jsFile'] = 'cekPesanan';
    $this -> bind('layout/home_footer', $data); 
?>