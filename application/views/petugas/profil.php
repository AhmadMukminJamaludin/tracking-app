<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, <?= $data_user['username'] ?>!</h2>
            <p class="section-lead">
                Anda dapat mengganti data informasi anda di halaman ini.
            </p>
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <?php if ($data_user['photo']) : ?>
                      <img alt="image" src="<?= base_url('images/' . $data_user['photo']) ?>" class="rounded-circle profile-widget-picture">
                    <?php else : ?>                     
                    <img alt="image" src="<?= base_url('') ?>assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <?php endif ?>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?= $data_user['name'] ?> <div class="text-muted d-inline font-weight-normal"></div></div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error eveniet mollitia accusantium atque corporis at? Repudiandae ad odio, deleniti optio, iusto aperiam repellendus nulla facere cumque, eum iure rerum?.
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" action="<?= base_url('petugas/update_profile')?>" enctype="multipart/form-data" class="needs-validation" novalidate="" accept-charset="utf-8">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-12">
                            <input type="hidden" name="id" value="<?= $data_user['id_users'] ?>" required="">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="<?= $data_user['name'] ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" value="<?= $data_user['nip'] ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Pengguna</label>
                            <input type="text" name="username" class="form-control" value="<?= $data_user['username'] ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-12">
                            <label>Divisi</label>
                            <select class="form-control" disabled>
                              <option>Pilih opsi</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $data_user['email'] ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>No. Whatsapp/telepon</label>
                            <input name="phone" type="text" class="form-control" value="<?= $data_user['phone'] ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Foto Profil</label>
                              <input type="file" name="userfile" size="20" class="form-control">
                              <div class="text-muted form-text">
                                Maksimum ukuran file adalah 5 MB, dengan jenis file ".jpg" ".png"
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
</div>