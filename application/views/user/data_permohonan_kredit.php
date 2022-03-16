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
                            <h4>PERMOHONAN KREDIT</h4>
                        </div>
                        <div class="card-body">
                        <?php if($data_permohonan_kredit['user_id']=='') : ?>
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
                                    <div class="wizard-step wizard-step-info">
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
                            <form class="needs-validation"  method="post" action="<?= base_url('user/form_data_permohonan_kredit') ?>"  enctype="multipart/form-data" class="needs-validation" novalidate="" accept-charset="utf-8">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah permohonan</label>
                            <input type="hidden" class="form-control" name="user_id" value="<?= $data_user['id_users'] ?>">
                            <div class="col-sm-12 col-md-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp
                                    </div>
                                    </div>
                                    <input type="text" class="form-control currency" name="jumlah_nominal" Placeholder="Masukkan nominal permohonan">
                                </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tujuan penggunaan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="tujuan_penggunaan">
                                        <option>- Pilih tujuan penggunaan -</option>
                                        <option value="Menambah modal usaha">Menambah modal usaha</option>
                                        <option value="Investasi">Investasi</option>
                                        <option value="Konsumsi">Konsumsi</option>
                                        <option value="Lainnya">Lainnya...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan penggunaan</label>
                            <div class="col-sm-12 col-md-7">                            
                                <textarea class="form-control" name="ket_penggunaan" Placeholder="Masukkan Keterangan penggunaan"></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jangka waktu</label>
                            <div class="col-sm-12 col-md-1">
                                <input type="text" class="form-control" name="jumlah_tanggungan" Placeholder="">
                                <small class="form-text text-muted">
                                    Bulan
                                </small>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jaminan kredit (Jelaskan secara rinci)</label>
                            <div class="col-sm-12 col-md-7">                            
                                <textarea class="form-control" name="jaminan_kredit" cols="30" rows="5" Placeholder="Masukkan Jaminan kredit (Jelaskan secara rinci)"></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Posisi jaminan</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio1" value="sedang dijaminkan" name="posisi_jaminan">
                                    <label class="form-check-label" for="inlineradio1">Sedang dijaminkan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio2" value="tidak sedang dijaminkan" name="posisi_jaminan">
                                    <label class="form-check-label" for="inlineradio2">Tidak sedang dijaminkan</label>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status jaminan</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio1" value="milik sendiri" name="status_jaminan">
                                    <label class="form-check-label" for="inlineradio1">Milik sendiri</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio2" value="milik keluarga" name="status_jaminan">
                                    <label class="form-check-label" for="inlineradio2">Milik keluarga</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio2" value="milik orang lain" name="status_jaminan">
                                    <label class="form-check-label" for="inlineradio2">Milik orang lain</label>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Scan Berkas <br> (Jadikan berkas dalam satu file)</label>
                            <div class="col-sm-12 col-md-7">                            
                                <input type="file" class="form-control" name="scan_berkas" Placeholder="">
                                <small class="form-text text-muted">
                                    Maksimum ukuran file: 25MB, dengan format file jpg|jpeg|png|JPG|PNG|JPEG|pdf.
                                </small>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-success btn-lg btn-icon icon-left"><i class="far fa-paper-plane"></i> Ajukan</button>
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
                        <a href="<?= site_url('user/data_pribadi_nasabah') ?>" class="btn btn-warning mt-4">Input data pribadi nasabah</a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
</div>