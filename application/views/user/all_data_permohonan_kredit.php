<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Permohonan Kredit</h1>
        </div>

        <div class="section-body">
        <h2 class="section-title">Data Nasabah</h2>
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (!$data_nasabah['user_id']=="") : ?>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama lengkap</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $data_nasabah['nama_nasabah'] ?>" readonly>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat/tgl. lahir</label>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control" name="tempat_lahir" Placeholder="Masukkan tempat lahir" value="<?= $data_nasabah['tempat_lahir'] ?>" readonly="">
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?= $data_nasabah['tanggal_lahir'] ?>" readonly="">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="phone" value="<?= $data_user['phone'] ?>" readonly="">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. KTP</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="no_ktp" Placeholder="Masukkan nomer Identitas/KTP anda" value="<?= $data_nasabah['no_ktp'] ?>" readonly="">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NPWP</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="npwp" Placeholder="Masukkan NPWP anda" value="<?= $data_nasabah['npwp'] ?>" readonly="">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kewarganegaraan</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="kewarganegaraan" Placeholder="Masukkan kewarganegaraan anda" value="<?= $data_nasabah['kewarganegaraan'] ?>" readonly="">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="provinsi" Placeholder="Masukkan provinsi anda" value="<?= $data_nasabah['provinsi'] ?>" readonly="">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis kelamin</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio1" value="pria" name="jenis_kelamin" <?php if($data_nasabah['jenis_kelamin'] == "pria"){ print 'checked'; }?>>
                                    <label class="form-check-label" for="inlineradio1">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio2" value="wanita" name="jenis_kelamin" <?php if($data_nasabah['jenis_kelamin'] == "wanita"){ print 'checked'; }?>>
                                    <label class="form-check-label" for="inlineradio2">Wanita</label>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio1" value="menikah" name="status_perkawinan" <?php if($data_nasabah['status_perkawinan'] == "menikah"){ print 'checked'; }?>>
                                    <label class="form-check-label" for="inlineradio1">Menikah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineradio2" value="lajang" name="status_perkawinan" <?php if($data_nasabah['status_perkawinan'] == "lajang"){ print 'checked'; }?>>
                                    <label class="form-check-label" for="inlineradio2">Lajang</label>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ibu kandung</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_ibu" Placeholder="Masukkan nama ibu anda" value="<?= $data_nasabah['nama_ibu'] ?>" readonly="">
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat sesuai identitas</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat_identitas" Placeholder="Masukkan alamat sesuai identitas anda" readonly=""><?= $data_nasabah['alamat_identitas'] ?></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat tempat tinggal terkini </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="alamat_terkini" Placeholder="Masukkan alamat tempat tinggal terkini anda" readonly=""><?= $data_nasabah['alamat_terkini'] ?></textarea>
                            </div>
                            </div>
                                <?php else : ?>
                                    <div class="empty-state" data-height="400">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>We couldn't find any data</h2>
                                        <p class="lead">
                                            Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                        </p>
                                        <a href="#" class="btn btn-primary mt-4">Create new One</a>
                                        <a href="#" class="mt-4 bb">Need Help?</a>
                                    </div>
                                <?php endif ?>
                        </div>
                        </div>
        <h2 class="section-title">Data Pekerjaan</h2>
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (!$data_pekerjaan['user_id']=="") : ?>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="pekerjaan">
                                            <option value="<?= $data_pekerjaan['pekerjaan']?>"><?= $data_pekerjaan['pekerjaan']?></option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bidang usaha</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="bd_usaha" Placeholder="Masukkan bidang usaha" value="<?= $data_pekerjaan['bd_usaha']?>" readonly="">
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama perusahaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nama_perusahaan" Placeholder="Masukkan Nama perusahaan" value="<?= $data_pekerjaan['nama_perusahaan']?>" readonly="">
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lama bekerja</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" class="form-control" name="tahun" value="<?= $data_pekerjaan['tahun']?>" readonly="">
                                        <small class="form-text text-muted">
                                            Tahun
                                        </small>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" class="form-control" name="bulan" value="<?= $data_pekerjaan['bulan']?>" readonly="">
                                        <small class="form-text text-muted">
                                            Bulan
                                        </small>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan Usaha / Gaji per tahun</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="penghasilan">
                                            <option value="<?= $data_pekerjaan['penghasilan']?>"><?= $data_pekerjaan['penghasilan']?></option>
                                        </select>
                                    </div>
                                    </div>
                                        <?php else : ?>
                                            <div class="empty-state" data-height="400">
                                                <div class="empty-state-icon">
                                                    <i class="fas fa-question"></i>
                                                </div>
                                                <h2>We couldn't find any data</h2>
                                                <p class="lead">
                                                    Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                                </p>
                                                <a href="#" class="btn btn-primary mt-4">Create new One</a>
                                                <a href="#" class="mt-4 bb">Need Help?</a>
                                            </div>
                                <?php endif ?>
                        </div>
                        </div>
                    </div>
                </div>
        <h2 class="section-title">Data Pribadi Nasabah</h2>
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (!$data_pribadi_nasabah['user_id']=="") : ?>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama lengkap sesuai KTP</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="name" value="<?= $data_pribadi_nasabah['name'] ?>" readonly>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat/tgl. lahir</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" class="form-control" name="tempat_lahir" Placeholder="Masukkan tempat lahir" value="<?= $data_pribadi_nasabah['tempat_lahir'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?= $data_pribadi_nasabah['tanggal_lahir'] ?>" readonly>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. KTP</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="no_ktp" Placeholder="Masukkan nomer Identitas/KTP anda" value="<?= $data_pribadi_nasabah['no_ktp'] ?>" readonly>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat sesuai KTP </label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="alamat_identitas" Placeholder="Masukkan alamat sesuai identitas anda" readonly><?= $data_pribadi_nasabah['alamat_identitas'] ?></textarea>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat rumah tempat tinggal </label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="alamat_terkini" Placeholder="Masukkan alamat tempat tinggal terkini anda" readonly><?= $data_pribadi_nasabah['alamat_terkini'] ?></textarea>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kepemilikan rumah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="kepemilikan_rumah">
                                            <option><?= $data_pribadi_nasabah['kepemilikan_rumah'] ?></option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lama menetap</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" class="form-control" name="tahun" value="<?= $data_pribadi_nasabah['tahun'] ?>" readonly>
                                        <small class="form-text text-muted">
                                            Tahun
                                        </small>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" class="form-control" name="bulan" value="<?= $data_pribadi_nasabah['bulan'] ?>" readonly>
                                        <small class="form-text text-muted">
                                            Bulan
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan terakhir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="pendidikan">
                                            <option><?= $data_pribadi_nasabah['pendidikan'] ?></option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Suami/Istri </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nama_suamiistri" Placeholder="Masukkan nama suami/istri anda" value="<?= $data_pribadi_nasabah['nama_suamiistri'] ?>" readonly>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama gadis ibu kandung </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nama_gadis_ibu_kandung" Placeholder="Masukkan nama gadis ibu kandung" value="<?= $data_pribadi_nasabah['nama_gadis_ibu_kandung'] ?>" readonly>
                                    </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah tanggungan </label>
                                    <div class="col-sm-12 col-md-1">
                                        <input type="text" class="form-control" name="jumlah_tanggungan" Placeholder="" value="<?= $data_pribadi_nasabah['jumlah_tanggungan'] ?>" readonly>
                                        <small class="form-text text-muted">
                                            anak
                                        </small>
                                    </div>
                                    </div>
                                        <?php else : ?>
                                            <div class="empty-state" data-height="400">
                                                <div class="empty-state-icon">
                                                    <i class="fas fa-question"></i>
                                                </div>
                                                <h2>We couldn't find any data</h2>
                                                <p class="lead">
                                                    Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                                </p>
                                                <a href="#" class="btn btn-primary mt-4">Create new One</a>
                                                <a href="#" class="mt-4 bb">Need Help?</a>
                                            </div>
                                <?php endif ?>
                        </div>
                        </div>
                    </div>
                </div>
        <h2 class="section-title">Data Permohonan Kredit</h2>
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (!$data_permohonan_kredit['user_id']=="") : ?>
                                <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah permohonan</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                        </div>
                                        <input type="text" class="form-control currency" name="jumlah_nominal" Placeholder="Masukkan nominal permohonan" value="<?= $data_permohonan_kredit['jumlah_nominal'] ?>" readonly>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tujuan penggunaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="tujuan_penggunaan">
                                            <option><?= $data_permohonan_kredit['tujuan_penggunaan'] ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan penggunaan</label>
                                <div class="col-sm-12 col-md-7">                            
                                    <textarea class="form-control" name="ket_penggunaan" Placeholder="Masukkan Keterangan penggunaan" readonly><?= $data_permohonan_kredit['ket_penggunaan'] ?></textarea>
                                </div>
                                </div>
                                <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jangka waktu</label>
                                <div class="col-sm-12 col-md-1">
                                    <input type="text" class="form-control" name="jumlah_tanggungan" Placeholder="" value="<?= $data_permohonan_kredit['jumlah_tanggungan'] ?>" readonly>
                                    <small class="form-text text-muted">
                                        Bulan
                                    </small>
                                </div>
                                </div>
                                <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jaminan kredit (Jelaskan secara rinci)</label>
                                <div class="col-sm-12 col-md-7">                            
                                    <textarea class="form-control" name="jaminan_kredit" Placeholder="Masukkan Jaminan kredit (Jelaskan secara rinci)" readonly><?= $data_permohonan_kredit['jaminan_kredit'] ?></textarea>
                                </div>
                                </div>
                                <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Posisi jaminan</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineradio1" value="sedang dijaminkan" name="posisi_jaminan" <?php if($data_permohonan_kredit['posisi_jaminan'] == "sedang dijaminkan"){ print 'checked'; }?>>
                                        <label class="form-check-label" for="inlineradio1">Sedang dijaminkan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineradio2" value="tidak sedang dijaminkan" name="posisi_jaminan"  <?php if($data_permohonan_kredit['posisi_jaminan'] == "tidak sedang dijaminkan"){ print 'checked'; }?>>
                                        <label class="form-check-label" for="inlineradio2">Tidak sedang dijaminkan</label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status jaminan</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineradio1" value="milik sendiri" name="status_jaminan" <?php if($data_permohonan_kredit['status_jaminan'] == "milik sendiri"){ print 'checked'; }?>>
                                        <label class="form-check-label" for="inlineradio1">Milik sendiri</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineradio2" value="milik keluarga" name="status_jaminan" <?php if($data_permohonan_kredit['status_jaminan'] == "milik keluarga"){ print 'checked'; }?>>
                                        <label class="form-check-label" for="inlineradio2">Milik keluarga</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineradio2" value="milik orang lain" name="status_jaminan" <?php if($data_permohonan_kredit['status_jaminan'] == "milik orang lain"){ print 'checked'; }?>>
                                        <label class="form-check-label" for="inlineradio2">Milik orang lain</label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Scan Berkas</label>
                                <div class="col-sm-12 col-md-7">
                                    <a href="<?= base_url('./berkas/'.$data_permohonan_kredit['scan_berkas']) ?>" download class="btn btn-primary">Download File Berkas</a>
                                </div>
                                </div>
                                <?php else : ?>
                                    <div class="empty-state" data-height="400">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>We couldn't find any data</h2>
                                        <p class="lead">
                                            Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                        </p>
                                        <a href="#" class="btn btn-primary mt-4">Create new One</a>
                                        <a href="#" class="mt-4 bb">Need Help?</a>
                                    </div>
                                <?php endif ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <h2 class="section-title">Progres permohonan kredit</h2>
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline__wrap">
                                    <div class="timeline__items">
                                        <?php foreach ($progres_permohonan_kredit as $key) : ?>
                                        <div class="timeline__item">
                                            <div class="timeline__content">
                                                <h2><?= date('d F Y', strtotime($key->tanggal_progres))  ?></h2>
                                                <span class="badge badge-primary"><?= $key->status_progres ?></span>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    