<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Pengaturan</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pengaturan halaman</h2>
                <p class="section-lead">
                Anda dapat mengatur halaman website disini.
                </p>

                <div class="row">
                <div class="col-12 col-md-6 col-sm-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Petunjuk</h4>
                    </div>
                    <div class="card-body">
                        <div class="gallery gallery-fw" data-item-height="300">
                            <div class="gallery-item" data-image="<?= base_url('') ?>assets/img/petunjuk.png" data-title="Image 1"></div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Pengaturan halaman</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('setting/EditSettings')?>" enctype="multipart/form-data" class="needs-validation" novalidate="" accept-charset="utf-8">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul 1</label>
                            <input type="hidden" class="form-control" name="id_setting">
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="judul_1">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Judul 1</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="subjudul_1">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul 2</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="judul_2">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Judul 2</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control" name="subjudul_2">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="gambar_lama">
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                            </div>                        
                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-9">
                                <button class="btn btn-primary">Save</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('setting/getSettings')?>",
            dataType: 'json',
            success: function(data)
            {	
                $('input[name="id_setting"]').val(data[0].id_setting);		
                $('input[name="judul_1"]').val(data[0].judul_1);		
                $('input[name="subjudul_1"]').val(data[0].subjudul_1);		
                $('input[name="judul_2"]').val(data[0].judul_2);	
                $('input[name="subjudul_2"]').val(data[0].subjudul_2);
                $('input[name="gambar_lama"]').val(data[0].gambar);
            }
        })
    });
</script>