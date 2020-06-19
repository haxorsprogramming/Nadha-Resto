<ul class="sidebar-menu" style='margin-top:20px;'>
  <!-- <li class="menu-header">Menu</li> -->
  <li><a class="nav-link btnDashboard" href="#!" v-on:click='berandaAct'><i class="fas fa-newspaper"></i> <span>Dashboard</span></a></li>
  <li><a class="nav-link btnKartuLaundry" href="#!" v-on:click=''><i class="fas fa-newspaper"></i> <span>Kartu Laundry</span></a></li>
  <li><a class="nav-link btnLaundryRoom" href="#!" v-on:click=''><i class="fas fa-newspaper"></i> <span>Laundry Room</span></a></li>
  <li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Data Master</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="#!" v-on:click=''>Produk & Service</a></li>
      <li><a class="nav-link" href="#!" v-on:click=''>Pelanggan</a></li>
      <li><a class="nav-link" href="#!" v-on:click=''>Level User</a></li>
      <li><a class="nav-link" href="#!">Pengeluaran Laundry</a></li>
    </ul>
  </li>
  <li><a class="nav-link " href="#!" v-on:click=''><i class="fas fa-newspaper"></i> <span>Data Transaksi</span></a></li>
  <li><a class="nav-link " href="#!"><i class="fas fa-newspaper"></i> <span>Setting Laundry</span></a></li>
  <li><a class="nav-link  " href="#!"><i class="fas fa-newspaper"></i> <span>Manajemen User</span></a></li>
  <li><a class="nav-link" id='btnLogOut' href="<?= HOMEBASE; ?>dasbor/logOut"><i class="fas fa-sign-out-alt"></i> <span>LogOut</span></a></li>
</ul>