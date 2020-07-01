<ul class="sidebar-menu" style='margin-top:20px;'>
  <!-- <li class="menu-header">Menu</li> -->
  <li><a class="nav-link btnDashboard" href="#!" v-on:click='berandaAct'><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
  <li><a class="nav-link btnKartuLaundry" href="#!" v-on:click=''><i class="far fa-newspaper"></i> <span>Monitoring Restoran</span></a></li>
  <li><a class="nav-link btnLaundryRoom" href="#!" v-on:click='pesananBaruAtc'><i class="fas fa-concierge-bell"></i> <span>Pesanan Baru</span></a></li>
  <li><a class="nav-link btnKartuLaundry" href="#!" v-on:click='pesananAtc'><i class="fas fa-clipboard"></i> <span>Daftar Pesanan Pesanan</span></a></li>
  <li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Data Master</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="#!" v-on:click='menuAtc'>Menu</a></li>
      <li><a class="nav-link" href="#!" v-on:click='pelangganAtc'>Pelanggan</a></li>
      <li><a class="nav-link" href="#!" v-on:click='mejaAtc'>Meja</a></li>
      <li><a class="nav-link" href='#!' v-on:click='promoAtc'>Promo</a></li>
      <li><a class="nav-link" href='#!' v-on:click=''>Mitra</a></li>
    </ul>
  </li>
  <li><a class="nav-link " href="#!" v-on:click=''><i class="fas fa-receipt"></i> <span>Data Transaksi</span></a></li>
  <li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cookie"></i> <span>Bahan Baku</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="#!" v-on:click=''>Data Bahan Baku</a></li>
      <li><a class="nav-link" href="#!" v-on:click=''>Pembelian Bahan</a></li>
      <li><a class="nav-link" href='#!' v-on:click=''>Setup Kebutuhan Menu</a></li>
    </ul>
  </li>
  <li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-line"></i> <span>Laporan & Statistik</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="#!" v-on:click=''>Arus Kas</a></li>
      <li><a class="nav-link" href="#!" v-on:click=''>Laporan Transaksi</a></li>
      <!-- <li><a class="nav-link" href="#!" v-on:click=''>Statistik Laundry</a></li> -->
    </ul>
  </li>
  <li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="	fas fa-cogs"></i> <span>Setting Resto</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="#!" v-on:click=''>Pengaturan Umum</a></li>
      <li><a class="nav-link" href="#!" v-on:click=''>Manajemen User</a></li>
      <li><a class="nav-link" href="#!" v-on:click=''>Backup & Restore Data</a></li>
    </ul>
  </li>
  <li><a class="nav-link" id='btnBantuan' href='#!' v-on:click=''><i class="fas fa-info-circle"></i> <span>Bantuan</span></a></li>
  <li><a class="nav-link" id='btnLogOut' href="<?= HOMEBASE; ?>dasbor/logOut"><i class="fas fa-sign-out-alt"></i> <span>LogOut</span></a></li>
</ul>  