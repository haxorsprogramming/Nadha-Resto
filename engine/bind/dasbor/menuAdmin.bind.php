<ul class="sidebar-menu" style='margin-top:20px;'>
  <!-- <li class="menu-header">Menu</li> -->
  <li><a class="nav-link btnDashboard" href="#!" v-on:click='berandaAct'><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
  <li><a class="nav-link btnKartuLaundry" href="#!" v-on:click=''><i class="fas fa-clipboard"></i> <span>Monitoring Restoran</span></a></li>
  <li><a class="nav-link btnLaundryRoom" href="#!" v-on:click=''><i class="fas fa-concierge-bell"></i> <span>Pesanan Baru</span></a></li>
  <li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Data Master</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="#!" v-on:click='menuAtc'>Menu</a></li>
      <li><a class="nav-link" href="#!" v-on:click=''>Pelanggan</a></li>
      <li><a class="nav-link" href='#!' v-on:click=''>Promo</a></li>
      <li><a class="nav-link" href='#!' v-on:click=''>Pesan Broadcast</a></li>
    </ul>
  </li>
  <li><a class="nav-link " href="#!" v-on:click=''><i class="fas fa-receipt"></i> <span>Data Transaksi</span></a></li>
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