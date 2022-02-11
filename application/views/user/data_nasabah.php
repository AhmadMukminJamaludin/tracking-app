<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Permohonan Kredit</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pengajuan Kredit</h2>
                <p class="section-lead">
                Ajukan kredit nasabah pada formulir dibawah.
                </p>

                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>DATA NASABAH <i>(sesuai identitas)</i></h4>
                        </div>
                        <div class="card-body">
                            <?php if($data_nasabah['user_id']=='') : ?>
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                        <i class="far fa-user"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                        DATA NASABAH
                                        </div>
                                    </div>
                                    <div class="wizard-step">
                                        <div class="wizard-step-icon">
                                        <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                        DATA PEKERJAAN
                                        </div>
                                    </div>
                                    <div class="wizard-step">
                                        <div class="wizard-step-icon">
                                        <i class="fas fa-user-graduate"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                        DATA PRIBADI NASABAH
                                        </div>
                                    </div>
                                    <div class="wizard-step">
                                        <div class="wizard-step-icon">
                                        <i class="fas fa-paper-plane"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                        PERMOHONAN KREDIT
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <form class="needs-validation" method="POST" action="<?= base_url('user/form_data_nasabah') ?>"  novalidate="">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama lengkap</label>
                            <input type="hidden" class="form-control" name="user_id" value="<?= $data_user['id_users'] ?>">
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $data_user['name'] ?>">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat/tgl. lahir</label>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="tempat_lahir" Placeholder="Masukkan tempat lahir">
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control datepicker" name="tanggal_lahir">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="phone" value="<?= $data_user['phone'] ?>">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. KTP</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="no_ktp" Placeholder="Masukkan nomer Identitas/KTP anda">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NPWP</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="npwp" Placeholder="Masukkan NPWP anda">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kewarganegaraan</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="kewarganegaraan" Placeholder="Masukkan kewarganegaraan anda">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="provinsi" Placeholder="Masukkan provinsi anda">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis kelamin</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio1" value="pria" name="jenis_kelamin">
                                    <label class="form-check-label" for="inlineradio1">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio2" value="wanita" name="jenis_kelamin">
                                    <label class="form-check-label" for="inlineradio2">Wanita</label>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio1" value="menikah" name="status_perkawinan">
                                    <label class="form-check-label" for="inlineradio1">Menikah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio2" value="lajang" name="status_perkawinan">
                                    <label class="form-check-label" for="inlineradio2">Lajang</label>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ibu kandung</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_ibu" Placeholder="Masukkan nama ibu anda">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat sesuai identitas</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat_identitas" Placeholder="Masukkan alamat sesuai identitas anda"></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat tempat tinggal terkini </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat_terkini" Placeholder="Masukkan alamat tempat tinggal terkini anda"></textarea>
                            </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary btn-lg btn-icon icon-left"><i class="far fa-paper-plane"></i> Save Changes</button>
                            </div>
                        </div>
                    </form>
                        </div>
                        <?php else : ?>
                            <div class="empty-state" data-height="400">
                                <div class="empty-state-icon bg-danger">
                                    <i class="fas fa-times"></i>
                                </div>
                                <h2>Request Failed</h2>
                                <p class="lead">
                                    Maaf anda sudah melakukan input data nasabah.
                                </p>
                                <a href="<?= site_url('user/data_pekerjaan') ?>" class="btn btn-warning mt-4">Input data pekerjaan</a>
                            </div>
                        <?php endif ?>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>