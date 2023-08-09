<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistem Informasi SP Tala</title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo_atrbpn.png') ?>">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('templates/node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('templates/node_modules/@fortawesome/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('templates/node_modules/ionicons201/css/ionicons.min.css') ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('templates/assets/modules/prism/prism.css') ?>">

  <!-- CSS Datatables -->
  <link rel="stylesheet" href="<?= base_url('templates/node_modules/datatables/media/css/jquery.dataTables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('templates/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('templates/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') ?>">

  <!-- CSS SweetAlert 2 -->
  <link rel="stylesheet" href="<?= base_url('templates/node_modules/sweetalert2/dist/sweetalert2.min.css') ?>">
  <!-- Page Specific CSS File -->

  <link rel="stylesheet" href="<?= base_url('assets/custom_css/loading_page.css') ?>">
  <?= $this->renderSection('page-css') ?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('templates/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('templates/assets/css/components.css') ?>">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body onload="hide_loading()">
  <div class="loading overlay">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
    <div class="lds-facebook">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <div id=" app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>

        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= base_url('templates/assets') ?>/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?= user()->nama ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= site_url('pengguna/show/' . user_id()) ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= site_url('logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">

            <a href="<?= site_url() ?>"><img alt="image" class="mr-3 mt-4 " width="100" src="<?= base_url('assets/img/logo_atrbpn.png') ?>">
              <h6 class="mt-3">Kantor Pertanahan Kabupaten Tanah Laut</h6>
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img alt="image" class="mr-3 rounded-circle" width="40" src="<?= base_url('assets/img/logo_atrbpn.png') ?>"></a>
          </div>

          <!-- side bar -->
          <?= $this->include('_layouts/sidebars') ?>

        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <?= $this->renderSection('content') ?>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          2023 <div class="bullet"></div> Seksi Survei dan Pemetaan Kabupaten Tanah Laut
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>
  <!-- modal -->
  <?= $this->renderSection('modal') ?>

  <!-- General JS Scripts -->
  <script>
    let fadeTarget = document.querySelector('.loading')

    function hide_loading() {
      fadeTarget.style.display = 'none';
    }
  </script>

  <script src="<?= base_url('templates/node_modules/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= base_url('templates/node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
  <script src="<?= base_url('templates') ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url('templates') ?>/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url('templates') ?>/node_modules/moment/min/moment.min.js"></script>
  <script src="<?= base_url('templates') ?>/assets/js/stisla.js"></script>

  <script src="<?= base_url('templates') ?>/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('templates') ?>/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('templates') ?>/node_modules/datatables.net-select\js/dataTables.select.min.js"></script>
  <script src="<?= base_url('templates') ?>/node_modules/jquery-ui-dist/jquery-ui.min.js"></script>
  <script src="<?= base_url('templates') ?>/assets/js/page/modules-ion-icons.js"></script>
  <!-- JS Libraies -->
  <script src="<?= base_url('templates') ?>/node_modules/jquery-ui-dist/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('templates/assets/js/page/bootstrap-modal.js') ?>"></script>
  <!-- sweetalert -->
  <script src="<?= base_url('templates/node_modules/sweetalert/dist/sweetalert.min.js') ?>"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('templates/assets') ?>/js/scripts.js"></script>
  <script src="<?= base_url('templates/assets') ?>/js/custom.js"></script>


  <!-- Page Specific JS File -->
  <?= $this->renderSection('page-script') ?>
</body>

</html>