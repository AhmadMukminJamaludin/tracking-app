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
                            <h4>DATA PEKERJAAN</h4>
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
                            <form class="needs-validation"  method="post" action="<?= base_url('admin/edit_form_data_pekerjaan') ?>"  novalidate="">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                            <input type="hidden" class="form-control" name="user_id" value="<?= $data_pekerjaan['user_id'] ?>">
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="pekerjaan">
                                    <option>- Pilih pekerjaan -</option>
                                    <option value="Pekerja swasta" <?php if($data_pekerjaan['pekerjaan'] == "Pekerja swasta"){ print 'selected'; }?>>Pekerja swasta</option>
                                    <option value="Pekerja negeri" <?php if($data_pekerjaan['pekerjaan'] == "Pekerja negeri"){ print 'selected'; }?>>Pekerja negeri</option>
                                    <option value="Wirausaha" <?php if($data_pekerjaan['pekerjaan'] == "Wirausaha"){ print 'selected'; }?>>Wirausaha</option>
                                    <option value="Pelajar" <?php if($data_pekerjaan['pekerjaan'] == "Pelajar"){ print 'selected'; }?>>Pelajar</option>
                                    <option value="Lainnya..." <?php if($data_pekerjaan['pekerjaan'] == "Lainnya..."){ print 'selected'; }?>>Lainnya...</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bidang usaha</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="bd_usaha" Placeholder="Masukkan bidang usaha" value="<?= $data_pekerjaan['bd_usaha'] ?>">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama perusahaan</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_perusahaan" Placeholder="Masukkan Nama perusahaan" value="<?= $data_pekerjaan['nama_perusahaan'] ?>">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lama bekerja</label>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="tahun" value="<?= $data_pekerjaan['tahun'] ?>">
                                <small class="form-text text-muted">
                                    Tahun
                                </small>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="bulan" value="<?= $data_pekerjaan['bulan'] ?>">
                                <small class="form-text text-muted">
                                    Bulan
                                </small>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan Usaha / Gaji per tahun</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="penghasilan">
                                    <option>- Pilih penghasilan -</option>
                                    <option value="5 juta" <?php if($data_pekerjaan['penghasilan'] == "5 juta"){ print 'selected'; }?>>Rp5.000.000,00 (5 juta)</option>
                                    <option value="lebih 5 juta" <?php if($data_pekerjaan['penghasilan'] == "lebih 5 juta"){ print 'selected'; }?>>> Rp5.000.000,00-Rp25.000.000,00 (> 5 juta - 25 juta)</option>
                                    <option value="lebih 25 juta" <?php if($data_pekerjaan['penghasilan'] == "lebih 25 juta"){ print 'selected'; }?>>> Rp25.000.000,00-Rp100.000.000,00 (> 25 juta - 100 juta)</option>
                                    <option value="lebih 100 juta" <?php if($data_pekerjaan['penghasilan'] == "lebih 100 juta"){ print 'selected'; }?>>> Rp100.000.000,00 (100 juta)</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary btn-lg btn-icon icon-left"><i class="far fa-paper-plane"></i> Save Changes</button>
                                <a href="<?= site_url('admin/edit_data_pribadi_nasabah/'. $data_pekerjaan['user_id']) ?>" class="btn btn-info btn-lg btn-icon icon-left"><i class="fas fa-briefcase"></i> Data pribadi nasabah</a>
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