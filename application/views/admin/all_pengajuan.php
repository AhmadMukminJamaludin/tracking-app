<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Data Pengajuan Kredit</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Data Pengajuan Kredit</h2>
            <p class="section-lead">
                Halaman ini menampilkan seluruh data pengajuan kredit yang pernah direkam sistem.
            </p>

            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Pengajuan Kredit</h4>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabel_all_pengajuan">
                        <thead>                                 
                            <tr>
                            <th class="text-center">
                                No.
                            </th>
                            <th>Foto</th>
                            <th>Nama pemohon</th>
                            <th>nominal permohonan</th>
                            <th>Tujuan penggunaan</th>
                            <th>Jaminan kredit</th>
                            <th>status permohonan</th>
                            <th>berkas</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>                                 
                            
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
    </div>
    </section>
</div>

<?php foreach ($all_pengajuan as $key) : ?>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_ubah_pengajuan<?= $key['user_id'] ?>" name="modal_ubah_pengajuan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Ubah Status Pengajuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?= site_url('pengajuan/tambah_progres_pengajuan') ?>" method="post">
                <div class="form-group">
                    <input type="hidden"  id="user_id" name="user_id" class="form-control" value="<?= $key['user_id'] ?>">
                    <input type="hidden" id="id_petugas" name="id_petugas" class="form-control" value="<?= $data_user['id_users'] ?>" >
                    <label>Ubah Status Permohonan</label>
                    <select class="form-control selectric" id="progress" name="progress">
                        <option value="">- Pilih status permohonan -</option>
                        <option value="2">Dalam pemeriksaan petugas...</option>
                        <option value="3">Permohonan kredit diterima</option>
                        <option value="4">Permohonan kredit ditolak</option>
                    </select>
                    <label>Ubah Progres Permohonan</label>
                    <select class="form-control selectric" id="status_pengajuan" name="status_pengajuan">
                        <option value="">- Pilih progres permohonan -</option>
                        <option value="Dalam pemeriksaan Customer Service">Dalam pemeriksaan Customer Service</option>
                        <option value="Dalam pemeriksaan Petugas SLIK">Dalam pemeriksaan Petugas SLIK</option>
                        <option value="Dalam pemeriksaan Kepala Bagian Analisis">Dalam pemeriksaan Kepala Bagian Analisis</option>
                        <option value="Seluruh berkas dalam pengiriman Staff Analisis">Seluruh berkas dalam pengiriman Staff Analisis</option>
                        <option value="Menunggu persetujuan Admin Analisa">Menunggu persetujuan Admin Analisa</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

<?php endforeach ?>