<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title><?=SITENAME; ?></title>
   <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
   <!-- General CSS Files -->
   <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/iziToast.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/jqvmap.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/summernote-bs4.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/wl.theme.default.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/datatables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/style.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/nadharesto.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/components.css">
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
  <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>

 </head>

 <body style="font-family: 'Nunito Sans';">
   <div id="app">
     <div class="main-wrapper">
       <div class="navbar-bg"  style='background-color:#2c3e50;'></div>
       <nav class="navbar navbar-expand-lg main-navbar">
         <form class="form-inline mr-auto">
           <ul class="navbar-nav mr-3">
             <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

           </ul>

         </form>
         <ul class="navbar-nav navbar-right">
         <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg" id='capNotif'><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
           <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
             <img alt="image" src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" class="rounded-circle mr-1">
             <div class="d-sm-none d-lg-inline-block">Hi, <?=$_SESSION['userSes']; ?></div></a>
             <div class="dropdown-menu dropdown-menu-right">
               <a href="#!" id='btnLogOutTop' class="dropdown-item has-icon text-danger">
                 <i class="fas fa-sign-out-alt"></i> Logout
               </a>
             </div>
           </li>
         </ul>
       </nav>
       <div class="main-sidebar" id='divMenu'>
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="#!" style='height:30px;'>
              <img src='<?=STYLEBASE; ?>/login/images/nadha_resto.png' style="width: 100px;">
              </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="#!">NL</a>
            </div>
            <?php
            $this -> bind('dasbor/menuAdmin');
            ?>
          </aside>
       </div>

       <!-- Main Content -->
       <div class="main-content">
         <section class="section">
           <div class="section-header">
             <h1 id='capUtama'> Nadha Resto - {{judulForm}}</h1>

           </div>
           
         <div id="divUtama">

       </div>
     </section>

     </div>
   </div>
 <footer class="main-footer" id='divFooter'>

           Copyright &copy; {{tahun}} - {{author}}

</footer>
   <!-- General JS Scripts -->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/popper.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/bootstrap.min.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/jquery.nicescroll.min.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/moment.min.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/stisla.js"></script>
   <!-- JS Libraies -->

   <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.simpleWeather.min.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/asset/modules/Chart.min.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.vmap.min.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/asset/maps/jquery.vmap.world.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.chocolat.min.js"></script> -->
     <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/datatables.min.js"></script>
     <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/iziToast.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <!-- Template JS File -->
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/scripts.js"></script>

   <!-- Page Specific JS File -->

   <script src="<?=STYLEBASE; ?>/dasbor/index.js"></script>
 </body>
 </html>
