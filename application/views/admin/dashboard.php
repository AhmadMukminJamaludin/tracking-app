      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pengguna</h4>
                  </div>
                  <div class="card-body">
                    <?= $total_pengguna ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="far fa-paper-plane"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pengajuan</h4>
                  </div>
                  <div class="card-body">
                  <?= $total_pengajuan ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-times-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengajuan Ditolak</h4>
                  </div>
                  <div class="card-body">
                  <?= $total_pengajuan_ditolak ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengajuan Diterima</h4>
                  </div>
                  <div class="card-body">
                  <?= $total_pengajuan_diterima ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4>Statistik pengajuan tahun <?= date('Y') ?></h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart2"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-5">
                <div class="card">
                  <div class="card-header">
                    <h4>Statistik pengajuan tahun <?= date('Y') ?></h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart4"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>