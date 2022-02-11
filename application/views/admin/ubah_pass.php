<!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
            <h1>Ganti Password</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Ganti password</h2>
                    <p class="section-lead">
                    Ganti password anda di halaman ini.
                    </p>
                
                
                <div class="row">
                    <div class="col-lg-5 col-12">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <?php if ($data_user['photo']) : ?>
                            <img alt="image" src="<?= base_url('images/' . $data_user['photo']) ?>" class="rounded-circle profile-widget-picture">
                            <?php else : ?>                     
                            <img alt="image" src="<?= base_url('') ?>assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                            <?php endif ?>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?= $data_user['name'] ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error eveniet mollitia accusantium atque corporis at? Repudiandae ad odio, deleniti optio, iusto aperiam repellendus nulla facere cumque, eum iure rerum?.
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xs-12">
                        <div class="card">
                        <form method="post" action="<?= base_url('admin/ubah_pass') ?>">
                            <div class="card-header">
                            <h4>Ganti password</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Password lama</label>
                                    <input type="password" class="form-control" name="old_password" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password baru</label>
                                    <input type="password" class="form-control" name="new_password" required="">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi password baru</label>
                                    <input type="password" class="form-control" name="change_password" required="">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>