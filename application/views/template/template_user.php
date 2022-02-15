<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title ?></title>

  <!-- General CSS Files -->
  <link rel="shortcut icon" href="<?= base_url('assets')?>/img/logo_instansi.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/prism/prism.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/timeline/timeline.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/datatables/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/chocolat/chocolat.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/css/head.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body class="layout-3">
<div id="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div id="error" data-error="<?= $this->session->flashdata('error') ?>"></div>
<div id="hello" data-hello="<?= $this->session->flashdata('hello') ?>"></div>
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide">TRACKING-APP</a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          
        </div>
        <form class="form-inline ml-auto">

        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <?php if ($data_user['photo']) : ?>
              <img alt="image" src="<?= base_url('images/' . $data_user['photo']) ?>" class="rounded-circle mr-1">
              <?php else : ?>                     
              <img alt="image" src="<?= base_url('') ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <?php endif ?>
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $data_user['username'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="<?= site_url('user/profil') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= site_url('user/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= site_url('user') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('user/data_nasabah') ?>" class="nav-link"><i class="far fa-paper-plane"></i><span>Form Pengajuan</span></a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('user/all_data_permohonan_kredit') ?>" class="nav-link"><i class="far fa-envelope"></i><span>Data Pengajuan</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <?php $this->load->view($page) ?>
      
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div><a href="#">Jamaludin</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('') ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url('') ?>assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/cleave-js/cleave.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/datatables/dataTables.select.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/prism/prism.js"></script>
  <script src="<?= base_url('') ?>assets/modules/timeline/timeline.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/chocolat/jquery.chocolat.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('') ?>assets/modules/izitoast/js/module-izitoast.js"></script>

  <script>
    var cleaveC = new Cleave('.currency', {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand'
    });
  </script>

<script>
  timeline(document.querySelectorAll('.timeline'), {
    forceVerticalMode: 700,
    mode: 'horizontal',
    verticalStartPosition: 'left',
    visibleItems: 4
  });
</script>
  
  <!-- Template JS File -->
  <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
</body>
</html>