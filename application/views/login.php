
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

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('') ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/css/head.css">
</head>

<body>
<div id="error" data-error="<?= $this->session->flashdata('error') ?>"></div>
<div id="message" data-message="<?= $this->session->flashdata('message') ?>"></div>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
          <img src="<?= base_url('assets')?>/img/logo_instansi.jpg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
          <?php foreach ($gambar as $key) : ?>
            <h4 class="text-dark font-weight-normal"><span class="font-weight-bold"><?= $key['judul_1'] ?></span></h4>
            <p class="text-muted"><?= $key['subjudul_1'] ?></p>
            <form method="POST" action="<?= base_url('auth') ?>" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Please fill in your email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Don't have an account? <a href="<?= site_url('auth/register') ?>">Create new one</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Jamaludin.
            </div>
          </div>
        </div>
        
          <?php if ($key['gambar']=='') : ?>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('') ?>assets/img/login/bg_instansi.jpg">
          <?php else : ?>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('assets/img/login/'.$key['gambar']) ?>">
          <?php endif ?>
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="pb-3">
                <h1 class="mb-2 display-4 font-weight-bold"><?= $key['judul_2'] ?></h1>
                <h5 class="font-weight-normal text-muted-transparent"><?= $key['subjudul_2'] ?></h5>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('') ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url('') ?>assets/modules/izitoast/js/iziToast.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('') ?>assets/js/scripts.js"></script>

  <script>
    var error = $('#error').data('error');
    var message = $('#message').data('message');
    if(error) {
      iziToast.warning({
          title: 'error!',
          message: error,
          position: 'topRight'
      });
    }
    if (message) {
      iziToast.success({
          title: 'Berhasil!',
          message: message,
          position: 'topRight'
      });
    }
    
  </script>

  <!-- Page Specific JS File -->
</body>
</html>
