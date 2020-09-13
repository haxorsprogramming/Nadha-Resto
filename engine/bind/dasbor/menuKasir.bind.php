<ul class="sidebar-menu" style='margin-top:20px;'>
    <li><a class="nav-link btnDashboard" href="#!" @click='berandaAct'><i class="fas fa-home"></i><span>Dashboard</span></a></li>
    <li><a class="nav-link btnKartuLaundry" href="#!" @click='monitoringAtc'><i class="far fa-newspaper"></i><span>Monitoring Restoran</span></a></li>
    <li><a class="nav-link btnLaundryRoom" href="#!" @click='pesananBaruAtc'><i class="fas fa-concierge-bell"></i><span>Pesanan Baru</span></a></li>
    <li><a class="nav-link btnKartuLaundry" href="#!" @click='pesananAtc'><i class="fas fa-clipboard"></i><span>Pesanan Resto</span></a></li>
    <li><a class="nav-link btnKartuLaundry" href="#!" @click='deliveryOrderAtc'><i class='fas fa-shipping-fast'></i><span>Delivery Order</span></a></li>
    <li><a class="nav-link" id='btnBantuan' href='#!' @click='bantuanAtc'><i class="fas fa-info-circle"></i> <span>Bantuan</span></a></li>
    <li><a class="nav-link" id='btnTentang' href='#!' @click='tentangAplikasiAtc'><i class="fas fa-heart"></i> <span>Tentang Aplikasi</span></a></li>
    <li><a class="nav-link" id='btnLogOut' href="<?= HOMEBASE; ?>dasbor/logOut"><i class="fas fa-sign-out-alt"></i> <span>LogOut</span></a></li>
</ul>