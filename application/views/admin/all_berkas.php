<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Kode Berkas</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Kode Berkas</h2>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="card">
                        <form class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Tambah Kode Berkas</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Berkas</label>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-8">
                                            <input type="text" name="kode_berkas" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-2">
                                            <button type="button" id="btn-tambah" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>                       
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kode Berkas</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Berkas</th>
                                            <th>Qrcode</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="target">

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

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit Kode Berkas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form class="needs-validation" novalidate="">
                <div class="form-group">
                    <label>Kode Berkas</label>
                    <div class="row">
                        <input type="hidden" name="edit_id_kode_berkas" class="form-control">
                        <div class="col-12">
                            <input type="text" name="edit_nama_kode_berkas" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="ubahKodeBerkas()" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

<script type="text/javascript">
    dataBerkas();
    function dataBerkas() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/data_berkas')?>',
            dataType: 'json',
            success: function(data) {
                var baris='';
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    baris += '<tr>'+
                                '<td>'+ no++ +' </td>' +
                                '<td> <h3>'+ data[i].kode_berkas +'</h3> </td>' +
                                '<td> <img src="<?php echo base_url('pengajuan/ciqrcode/'); ?>'+ data[i].qrcode +'" alt=""></td>' +
                                '<td> <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="getDataEditKodeBerkas('+ data[i].id_kode_berkas +')"><i class="far fa-edit"></i> Edit</button> <button class="btn btn-icon icon-left btn-danger" id="btn-hapus" onclick="hapusKodeBerkas('+ data[i].id_kode_berkas +')"><i class="fas fa-times"></i> Hapus</button> </td>' +
                            '</td>';                    
                }
                $('#target').html(baris);
            }
        });
    }

    $("#btn-tambah").on('click',function(){
        var kode_berkas = $('input[name="kode_berkas"]').val();

        if (kode_berkas=='') {
            iziToast.error({
                title: 'Gagal!',
                message: 'Kode berkas tidak boleh kosong.',
                position: 'topRight'
            });
        } else {
            $.ajax({
                type: 'POST',
                data: 'kode_berkas='+kode_berkas,
                url: '<?php echo base_url('admin/tambah_kode_berkas') ?>',
                datatype: 'json',
                success: function(hasil){
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Kode berkas berhasil ditambahkan',
                        position: 'topRight'
                    });
                    $('input[name="kode_berkas"]').val('');
                    dataBerkas();
                }
            })
        }
    });

    function hapusKodeBerkas(id) {
        swal({
            title: 'Apakah anda yakin ?',
            text: 'Kode berkas akan dihapus!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "<?php echo site_url('admin/hapus_kode_berkas/')?>"+id,
                    type: "POST",
                    success: function(data)
                    {	
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Kode berkas berhasil dihapus',
                            position: 'topRight'
                        });
                        dataBerkas();							
                    }
                })
            }
        });
    };

    function getDataEditKodeBerkas(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/data_edit_kode_berkas/')?>'+id,
            dataType: 'json',
            success: function(data) {
                $('input[name="edit_id_kode_berkas"]').val(data[0].id_kode_berkas);                
                $('input[name="edit_nama_kode_berkas"]').val(data[0].kode_berkas);                
            }
        });
    };

    function ubahKodeBerkas() {
        var edit_nama_kode_berkas =  $('input[name="edit_nama_kode_berkas"]').val();
        var edit_id_kode_berkas =  $('input[name="edit_id_kode_berkas"]').val();

        if (edit_nama_kode_berkas=='') {
            iziToast.error({
                title: 'Gagal!',
                message: 'Kode berkas tidak boleh kosong.',
                position: 'topRight'
            });
        } else {
            $.ajax({
                type: 'POST',
                data: 'id_kode_berkas='+edit_id_kode_berkas+'&kode_berkas='+edit_nama_kode_berkas,
                url: '<?php echo base_url('admin/edit_kode_berkas') ?>',
                datatype: 'json',
                success: function(hasil){
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Kode berkas berhasil diubah',
                        position: 'topRight'
                    });
                    dataBerkas();
                    $("#exampleModal").modal('hide');
                }
            })
        }
    }
</script>