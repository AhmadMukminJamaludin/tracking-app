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
                            <h4>DATA PRIBADI NASABAH/CALON NASABAH</h4>
                        </div>
                        <div class="card-body">
                        <?php if($data_pribadi_nasabah['user_id']=='') : ?>
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
                                        <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                        <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                        DATA PEKERJAAN
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
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
                            <form class="needs-validation"  method="post" action="<?= base_url('user/form_data_pribadi_nasabah') ?>"  novalidate="">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama lengkap sesuai KTP</label>
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
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. KTP</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="no_ktp" Placeholder="Masukkan nomer Identitas/KTP anda">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat sesuai KTP </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat_identitas" Placeholder="Masukkan alamat sesuai identitas anda"></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat rumah tempat tinggal </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat_terkini" Placeholder="Masukkan alamat tempat tinggal terkini anda"></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kepemilikan rumah</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="kepemilikan_rumah">
                                    <option>- Pilih kepemilikan rumah -</option>
                                    <option value="milik sendiri">Milik Sendiri</option>
                                    <option value="kredit">Kredit</option>
                                    <option value="sedang dijaminkan kepada">Sedang Dijaminkan Kepada</option>
                                    <option value="milik keluarga">Milik Keluarga</option>
                                    <option value="rumah dinas">Rumah Dinas</option>
                                    <option value="sewa, kontrak">Sewa , Kontrak</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lama menetap</label>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="tahun">
                                <small class="form-text text-muted">
                                    Tahun
                                </small>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="bulan">
                                <small class="form-text text-muted">
                                    Bulan
                                </small>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan terakhir</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="pendidikan">
                                    <option>- Pilih pendidikan terakhir -</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="D3">D3</option>
                                    <option value="SLTA">SLTA</option>
                                    <option value="SLTP">SLTP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Suami/Istri </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_suamiistri" Placeholder="Masukkan nama suami/istri anda">
                            </div>
                            </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama gadis ibu kandung </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_gadis_ibu_kandung" Placeholder="Masukkan nama gadis ibu kandung">
                            </div>
                            </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah tanggungan </label>
                            <div class="col-sm-12 col-md-1">
                                <input type="text" class="form-control" name="jumlah_tanggungan" Placeholder="">
                                <small class="form-text text-muted">
                                    anak
                                </small>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary btn-lg btn-icon icon-left"><i class="far fa-paper-plane"></i> Save Changes</button>
                            </div>
                            </div>
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
                        <a href="<?= site_url('user/data_permohonan_kredit') ?>" class="btn btn-warning mt-4">Input data permohonan kredit</a>
                        <a href="<?= site_url('user/data_pekerjaan') ?>" class="btn btn-warning mt-4">Input data pekerjaan</a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
</div>