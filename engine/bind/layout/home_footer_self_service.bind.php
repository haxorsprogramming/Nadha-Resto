<!-- Footer -->
<footer id="footer" class="bg-dark dark">
                <div class="container">
                    <!-- Footer 1st Row -->
                    <div class="footer-first-row row">
                        <div class="col-lg-3 text-center">
                            <a href="index.html">
                                <img src="assets/img/logo-light.svg" alt="" width="88" class="mt-5 mb-5">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <h5 class="text-muted">Promo terbaru</h5>
                            <ul class="list-posts">
                                <?php foreach($data['promo'] as $dp) : ?>
                                <li>
                                    <a href="blog-post.html" class="title"><?=$dp['nama']; ?></a>
                                    <span class="date"><?=$dp['deks']; ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-lg-5 col-md-6">
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
                                <a href="#!" class="action-icon" @click="hapusItem(li.kdMenu)"><i class="ti ti-close"></i></a>
                            </td>
                        </tr>
                    </table>
                    <div style="padding:12px;">
                        <h5>Total <strong>Rp. {{ Number(totalHarga).toLocaleString() }}</strong></h5>
                    </div>
                </div>
            </div>
            <a href="#!" class="panel-cart-action btn btn-secondary btn-block btn-lg" onclick='checkOut()'>
                <span>Go to checkout</span>
            </a>
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
    </div>
    </div>
    </div>
    </div>
    <!-- JS Core -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?=HOMEBASE; ?>ladun/home/dist/js/core.js"></script>
    <script>
        const server = "<?=HOMEBASE; ?>";
    </script>
    <script src="<?=HOMEBASE; ?>ladun/home/js/selfService.js"></script>
</body>
</html>