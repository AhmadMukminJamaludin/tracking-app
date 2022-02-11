
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

  <!-- css library -->
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/izitoast/css/iziToast.min.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('') ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('') ?>assets/css/head.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
<div id="error" data-error="<?= $this->session->flashdata('error') ?>"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="form-group col-lg-7 col-sm-12">
                      <label for="name">Nama lengkap</label>
                      <input id="frist_name" type="text" class="form-control" name="name" autofocus>
                    </div>
                    <div class="form-group col-lg-5 col-sm-12">
                      <label for="username">Nama pengguna</label>
                      <input id="last_name" type="text" class="form-control" name="username">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-7 col-sm-12">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-5 col-sm-12">
                        <label for="phone">No. Whatsapp/telepon</label>
                        <input id="last_name" type="text" class="form-control" name="phone">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-12">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="new_password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Jamaludin 2022
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

  <!-- js library -->
  <script src="<?= base_url('') ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>    
  <script src="<?= base_url('') ?>assets/modules/izitoast/js/iziToast.min.js"></script>

  <script>
    var error = $('#error').data('error');
    if(error) {
      iziToast.warning({
          title: 'Error!',
          message: error,
          position: 'topCenter'
      });
    }
    
  </script>
  
  <!-- Template JS File -->
  <script src="<?= base_url('') ?>assets/js/scripts.js"></script>
  <script src="<?= base_url('') ?>assets/js/custom.js"></script>
</body>
</html>