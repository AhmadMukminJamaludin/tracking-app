<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Pengajuan Kredit</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pengajuan Kredit</h2>
                <p class="section-lead">
                Ajukan kredit nasabah pada formulir dibawah.
                </p>

                <div class="row">
                <div class="col-12">
                    <form class="needs-validation" novalidate="">
                        <div class="card">
                        <div class="card-header">
                            <h4>Formulir Pengajuan Kredit</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama lengkap</label>
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
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Rumah</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat" Placeholder="Masukkan alamat rumah"></textarea>
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
                                <input type="text" class="form-control" name="no_ktp">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominal permohonan</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp.
                                    </div>
                                    </div>
                                    <input type="text" class="form-control currency" name="nominal">
                                </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Untuk keperluan</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="keperluan" Placeholder="Masukkan keperluan anda"></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jaminan</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="jaminan" Placeholder="Masukkan jaminan anda"></textarea>
                            </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary btn-lg btn-icon icon-left"><i class="far fa-paper-plane"></i> Ajukan</button>
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