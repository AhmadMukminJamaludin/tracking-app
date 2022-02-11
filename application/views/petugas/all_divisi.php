<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Divisi</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Divisi</h2>
                <p class="section-lead">Halaman ini menampilkan data divisi karyawan.</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="card">
                        <form class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Tambah Data Divisi</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Divisi</label>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-8">
                                            <input type="text" name="nama_divisi" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-2">
                                            <button type="button" id="btn-tambah" class="btn btn-primary">Submit</button>
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
                            <h4>Data Divisi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama divisi</th>
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
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form class="needs-validation" novalidate="">
                <div class="form-group">
                    <label>Nama Divisi</label>
                    <div class="row">
                        <input type="hidden" name="edit_id_divisi" class="form-control">
                        <div class="col-12">
                            <input type="text" name="edit_nama_divisi" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="ubahDivisi()" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

<script type="text/javascript">
    dataDivisi();
    function dataDivisi() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/data_divisi')?>',
            dataType: 'json',
            success: function(data) {
                var baris='';
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    baris += '<tr>'+
                                '<td>'+ no++ +' </td>' +
                                '<td>'+ data[i].nama_divisi +' </td>' +
                                '<td> <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="getDataEditDivisi('+ data[i].id_divisi +')"><i class="far fa-edit"></i> Edit</button> <button class="btn btn-icon icon-left btn-danger" id="btn-hapus" onclick="hapusDivisi('+ data[i].id_divisi +')"><i class="fas fa-times"></i> Hapus</button> </td>' +
                            '</td>';                    
                }
                $('#target').html(baris);
            }
        });
    }

    $("#btn-tambah").on('click',function(){
        var nama_divisi = $('input[name="nama_divisi"]').val();

        if (nama_divisi=='') {
            iziToast.error({
                title: 'Gagal!',
                message: 'Nama divisi tidak boleh kosong.',
                position: 'topRight'
            });
        } else {
            $.ajax({
                type: 'POST',
                data: 'nama_divisi='+nama_divisi,
                url: '<?php echo base_url('admin/tambah_divisi') ?>',
                datatype: 'json',
                success: function(hasil){
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data divisi berhasil ditambahkan',
                        position: 'topRight'
                    });
                    $('input[name="nama_divisi"]').val('');
                    dataDivisi();
                }
            })
        }
    });

    function hapusDivisi(id) {
        swal({
            title: 'Apakah anda yakin ?',
            text: 'Data divisi akan dihapus!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "<?php echo site_url('admin/hapus_divisi/')?>"+id,
                    type: "POST",
                    success: function(data)
                    {	
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Data divisi berhasil dihapus',
                            position: 'topRight'
                        });
                        dataDivisi();							
                    }
                })
            }
        });
    };

    function getDataEditDivisi(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/data_edit_divisi/')?>'+id,
            dataType: 'json',
            success: function(data) {
                $('input[name="edit_id_divisi"]').val(data[0].id_divisi);                
                $('input[name="edit_nama_divisi"]').val(data[0].nama_divisi);                
            }
        });
    };

    function ubahDivisi() {
        var edit_nama_divisi =  $('input[name="edit_nama_divisi"]').val();
        var edit_id_divisi =  $('input[name="edit_id_divisi"]').val();

        if (edit_nama_divisi=='') {
            iziToast.error({
                title: 'Gagal!',
                message: 'Nama divisi tidak boleh kosong.',
                position: 'topRight'
            });
        } else {
            $.ajax({
                type: 'POST',
                data: 'id_divisi='+edit_id_divisi+'&nama_divisi='+edit_nama_divisi,
                url: '<?php echo base_url('admin/edit_divisi') ?>',
                datatype: 'json',
                success: function(hasil){
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data divisi berhasil diubah',
                        position: 'topRight'
                    });
                    dataDivisi();
                    $("#exampleModal").modal('hide');
                }
            })
        }
    }
</script>