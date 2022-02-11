<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Nasabah</h1>
        </div>

        <div class="section-body">
        <h2 class="section-title">Data Nasabah</h2>
            <p class="section-lead">
              Halaman ini menampilkan seluruh data nasabah yang ada di basis data.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data seluruh nasabah</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 mb-4">
                        <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-user-plus"></i> Tambah</button>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" style="width:100%" id="tabel_pengguna">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Foto</th>
                            <th>Nama lengkap</th>
                            <th>username</th>
                            <th>Email</th>
                            <th>No. Whatsapp/telepon</th>
                            <th class="text-center">Aksi</th>
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

<div class="modal fade" tabindex="-1" role="dialog" id="ModalTambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah data nasabah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
            <div class="form-group">
              <label>Nama lengkap</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Nama lengkap" name="name">
              </div>
            </div>
            <div class="form-group">
              <label>Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Nama pengguna" name="username" >
              </div>
            </div>
            <div class="form-group">
              <label>No. Whatsapp/telepon</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fab fa-whatsapp"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="No. Whatsapp/telepon" name="phone" >
              </div>
            </div>
            <div class="form-group">
              <label>Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Email" name="email">
              </div>
            </div>      
            <div class="form-group">
              <label>Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </div>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="tambahNasabah()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="ModalEdit">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit data nasabah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label>Nama lengkap</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                  <input type="hidden" class="form-control" name="id_edit">
                </div>
                <input type="text" class="form-control" placeholder="Nama lengkap" name="name_edit">
              </div>
            </div>
            <div class="form-group">
              <label>Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Nama pengguna" name="username_edit" >
              </div>
            </div>
            <div class="form-group">
              <label>No. Whatsapp/telepon</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fab fa-whatsapp"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="No. Whatsapp/telepon" name="phone_edit" >
              </div>
            </div>
            <div class="form-group">
              <label>Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Email" name="email_edit">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="ubahNasabah()" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

<script>
  function tambahNasabah() {
    var name = $('input[name="name"]').val();
    var username = $('input[name="username"]').val();
    var phone = $('input[name="phone"]').val();
    var email = $('input[name="email"]').val();
    var password = $('input[name="password"]').val();
    var table = $('#tabel_pengguna').DataTable();

    if (name=='') {
      iziToast.error({
          title: 'Gagal!',
          message: 'Nama lengkap tidak boleh kosong.',
          position: 'topRight'
      });
    } else if (email=='') {
      iziToast.error({
          title: 'Gagal!',
          message: 'Email tidak boleh kosong.',
          position: 'topRight'
      });
    } else if (password=='') {
      iziToast.error({
          title: 'Gagal!',
          message: 'Password tidak boleh kosong.',
          position: 'topRight'
      });
    } else {
      $.ajax({
            type: 'POST',
            data: 'name='+name+'&username='+username+'&phone='+phone+'&email='+email+'&password='+password,
            url: '<?php echo base_url('admin/tambah_nasabah') ?>',
            datatype: 'json',
            success: function(hasil){
              table.ajax.reload();
                $('input[name="name"]').val('');
                $('input[name="username"]').val('');
                $('input[name="phone"]').val('');
                $('input[name="email"]').val('');
                $('input[name="password"]').val(''); 
                iziToast.success({
                    title: 'Berhasil!',
                    message: 'Data nasabah berhasil ditambahkan',
                    position: 'topRight'
                });  
                $("#ModalTambah").modal('hide');           
            }
      })
    }
  }

  function hapusNasabah(id) {
      swal({
          title: 'Apakah anda yakin ?',
          text: 'Data nasabah akan dihapus!',
          icon: 'warning',
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          var table = $('#tabel_pengguna').DataTable();
          if (willDelete) {
              $.ajax({
                  url : "<?php echo site_url('admin/hapus_nasabah/')?>"+id,
                  type: "POST",
                  success: function(data)
                  {	
                      iziToast.success({
                          title: 'Berhasil!',
                          message: 'Data nasabah berhasil dihapus',
                          position: 'topRight'
                      });		
                      table.ajax.reload();				
                  }
              })
          }
      });
  }
  
  function getDataEditNasabah(id) {
    $.ajax({
        type: "POST",
        url : "<?php echo site_url('admin/data_edit_nasabah/')?>"+id,
        dataType: 'json',
        success: function(data)
        {	
          $('input[name="id_edit"]').val(data[0].id_users);		
          $('input[name="name_edit"]').val(data[0].name);		
          $('input[name="username_edit"]').val(data[0].username);	
          $('input[name="phone_edit"]').val(data[0].phone);
          $('input[name="email_edit"]').val(data[0].email);
        }
    })
  }

  function ubahNasabah() {
    var id = $('input[name="id_edit"]').val();
    var name = $('input[name="name_edit"]').val();
    var username = $('input[name="username_edit"]').val();
    var phone = $('input[name="phone_edit"]').val();
    var email = $('input[name="email_edit"]').val();
    var table = $('#tabel_pengguna').DataTable();
    $.ajax({
        type: "POST",
        data: 'id_users='+id+'&name_edit='+name+'&username_edit='+username+'&phone_edit='+phone+'&email_edit='+email,
        url : "<?php echo site_url('admin/edit_nasabah/')?>"+id,
        dataType: 'json',
        success: function(data)
        {	
          iziToast.success({
              title: 'Berhasil!',
              message: 'Data nasabah berhasil diubah',
              position: 'topRight'
          });		
          table.ajax.reload();
          $("#ModalEdit").modal('hide');
        }
    })
  }



</script>