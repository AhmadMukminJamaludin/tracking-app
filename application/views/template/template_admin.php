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
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/prism/prism.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/datatables/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/timeline/timeline.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/chocolat/chocolat.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('') ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/css/head.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
<div id="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div id="error" data-error="<?= $this->session->flashdata('error') ?>"></div>
<div id="hello" data-hello="<?= $this->session->flashdata('hello') ?>"></div>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
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
              <a href="<?= site_url('admin/profil') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?= site_url('setting') ?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('admin/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= site_url('admin') ?>">Tracking-APP</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= site_url('admin') ?>">T-APP</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href="<?= base_url('admin') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Manajemen Akun</li>
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Akun</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('admin/profil') ?>">Profil</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/ubah_pass') ?>">Ganti Password</a></li>
              </ul>
              <li class="menu-header">Master Data</li>
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i><span>Data</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= site_url('admin/all_pegawai') ?>">Pegawai</a></li>
                  <li><a class="nav-link" href="<?= site_url('admin/all_pengguna') ?>">Nasabah</a></li>
                  <li><a class="nav-link" href="<?= site_url('admin/all_divisi') ?>">Divisi</a></li>
                  <li><a class="nav-link" href="<?= site_url('admin/all_pengajuan') ?>">Pengajuan</a></li>
                  <li><a class="nav-link" href="<?= site_url('admin/all_berkas') ?>">Kode Berkas</a></li>
                </ul>
              </li>
              <li class="menu-header">Pengajuan Kredit</li>
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-paper-plane"></i><span>Pengajuan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= site_url('pengajuan') ?>">Buat Pengajuan Kredit</a></li>
                  <li><a class="nav-link" href="<?= site_url('admin/all_pengajuan') ?>">Progres Pengajuan</a></li>
                </ul>
              </li>
              <!-- <li><a class="nav-link" href="<?= base_url('setting') ?>"><i class="fas fa-cogs"></i> <span>Pengaturan</span></a></li> -->
          </ul>
        </aside>
      </div>

      <?php $this->load->view($page) ?>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div><a href="#">Jamaludin</a>
        </div>
        <div class="footer-right">
          Version 1.1
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
  <script src="<?= base_url('') ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/timeline/timeline.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/chartjs/chart.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/datatables/dataTables.select.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/prism/prism.js"></script>
  <script src="<?= base_url('') ?>assets/modules/chocolat/jquery.chocolat.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?= base_url('') ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('') ?>assets/modules/izitoast/js/module-izitoast.js"></script>

  <script>
    $("#tabel_pengguna").dataTable({
      "responsive" : true,
      "destroy": true,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
          "url": "<?= site_url('admin/ambilAllPengguna') ?>",
          "type": "POST"
      },


      "columnDefs": [{
          "targets": [0],
          "orderable": false,
          "width": 6
      }],
    });

    $("#tabel_pegawai").dataTable({
      "responsive" : true,
      "destroy": true,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
          "url": "<?= site_url('admin/ambilAllPegawai') ?>",
          "type": "POST"
      },


      "columnDefs": [{
          "targets": [0],
          "orderable": false,
          "width": 6
      }],
    });

    $("#tabel_all_pengajuan").dataTable({
      "responsive" : true,
      "destroy": true,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
          "url": "<?= site_url('pengajuan/ambilAllPengajuan') ?>",
          "type": "POST"
      },


      "columnDefs": [{
          "targets": [0],
          "orderable": false,
          "width": 6
      }],
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

<script>
  var ctx = document.getElementById("myChart2").getContext('2d');
  var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    datasets: [{
      label: 'Permohonan',
      data: <?= '['.$januari.','.$februari.','.$maret.','.$april.','.$mei.','.$juni.','.$juli.','.$agustus.','.$september.','.$oktober.','.$november.','.$desember.']' ?>,
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 10
        }
      }],
      xAxes: [{
        ticks: {
          display: true
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});

var ctx = document.getElementById("myChart4").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        <?= $total_pengajuan_diterima_bulan_sekarang ?>,
        <?= $total_pengajuan_ditolak_bulan_sekarang ?>
      ],
      backgroundColor: [
        '#6EBF8B',
        '#D82148',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Pengajuan diterima',
      'Pengajuan ditolak'
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'right'
    },
  }
});
</script>


  <!-- Template JS File -->
  <script src="<?= base_url('') ?>assets/js/scripts.js"></script>
  <script src="<?= base_url('') ?>assets/js/modals.js"></script>

</body>
</html>