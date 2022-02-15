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
                            <form class="needs-validation"  method="post" action="<?= base_url('admin/edit_form_data_pribadi_nasabah') ?>"  novalidate="">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama lengkap sesuai KTP</label>
                            <input type="hidden" class="form-control" name="user_id" value="<?= $data_pribadi_nasabah['user_id'] ?>">
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $data_pribadi_nasabah['name'] ?>">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat/tgl. lahir</label>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="tempat_lahir" Placeholder="Masukkan tempat lahir" value="<?= $data_pribadi_nasabah['tempat_lahir'] ?>">
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?= $data_pribadi_nasabah['tanggal_lahir'] ?>">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. KTP</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="no_ktp" Placeholder="Masukkan nomer Identitas/KTP anda" value="<?= $data_pribadi_nasabah['no_ktp'] ?>">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat sesuai KTP </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat_identitas" Placeholder="Masukkan alamat sesuai identitas anda"><?= $data_pribadi_nasabah['alamat_identitas'] ?></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat rumah tempat tinggal </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat_terkini" Placeholder="Masukkan alamat tempat tinggal terkini anda"><?= $data_pribadi_nasabah['alamat_terkini'] ?></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kepemilikan rumah</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="kepemilikan_rumah">
                                    <option>- Pilih kepemilikan rumah -</option>
                                    <option value="milik sendiri" <?php if($data_pribadi_nasabah['kepemilikan_rumah'] == "milik sendiri"){ print 'selected'; }?>>Milik Sendiri</option>
                                    <option value="kredit" <?php if($data_pribadi_nasabah['kepemilikan_rumah'] == "kredit"){ print 'selected'; }?>>Kredit</option>
                                    <option value="sedang dijaminkan kepada" <?php if($data_pribadi_nasabah['kepemilikan_rumah'] == "sedang dijaminkan kepada"){ print 'selected'; }?>>Sedang Dijaminkan Kepada</option>
                                    <option value="milik keluarga" <?php if($data_pribadi_nasabah['kepemilikan_rumah'] == "milik keluarga"){ print 'selected'; }?>>Milik Keluarga</option>
                                    <option value="rumah dinas" <?php if($data_pribadi_nasabah['kepemilikan_rumah'] == "rumah dinas"){ print 'selected'; }?>>Rumah Dinas</option>
                                    <option value="sewa, kontrak" <?php if($data_pribadi_nasabah['kepemilikan_rumah'] == "sewa, kontrak"){ print 'selected'; }?>>Sewa , Kontrak</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lama menetap</label>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="tahun" value="<?= $data_pribadi_nasabah['tahun'] ?>">
                                <small class="form-text text-muted">
                                    Tahun
                                </small>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="bulan" value="<?= $data_pribadi_nasabah['bulan'] ?>">
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
                                    <option value="S1" <?php if($data_pribadi_nasabah['pendidikan'] == "S1"){ print 'selected'; }?>>S1</option>
                                    <option value="S2" <?php if($data_pribadi_nasabah['pendidikan'] == "S2"){ print 'selected'; }?>>S2</option>
                                    <option value="S3" <?php if($data_pribadi_nasabah['pendidikan'] == "S3"){ print 'selected'; }?>>S3</option>
                                    <option value="D3" <?php if($data_pribadi_nasabah['pendidikan'] == "D3"){ print 'selected'; }?>>D3</option>
                                    <option value="SLTA" <?php if($data_pribadi_nasabah['pendidikan'] == "SLTA"){ print 'selected'; }?>>SLTA</option>
                                    <option value="SLTP" <?php if($data_pribadi_nasabah['pendidikan'] == "SLTP"){ print 'selected'; }?>>SLTP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Suami/Istri </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_suamiistri" Placeholder="Masukkan nama suami/istri anda" value="<?= $data_pribadi_nasabah['nama_suamiistri'] ?>">
                            </div>
                            </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama gadis ibu kandung </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_gadis_ibu_kandung" Placeholder="Masukkan nama gadis ibu kandung" value="<?= $data_pribadi_nasabah['nama_gadis_ibu_kandung'] ?>">
                            </div>
                            </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah tanggungan </label>
                            <div class="col-sm-12 col-md-1">
                                <input type="text" class="form-control" name="jumlah_tanggungan" Placeholder="" value="<?= $data_pribadi_nasabah['jumlah_tanggungan'] ?>">
                                <small class="form-text text-muted">
                                    anak
                                </small>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary btn-lg btn-icon icon-left"><i class="far fa-paper-plane"></i> Save Changes</button>
                                <a href="<?= site_url('admin/edit_data_permohonan_kredit/'. $data_pribadi_nasabah['user_id']) ?>" class="btn btn-info btn-lg btn-icon icon-left"><i class="fas fa-briefcase"></i> Data permohonan kredit</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>