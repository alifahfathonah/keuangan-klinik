<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Akun</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('akun/simpan') ?>" role="form">
            <div class="card-body">
              <div class="form-group">
                <label>Jenis Akun</label>
                <select class="form-control" name="jnakun">
                  <option value="M">PENDAPATAN</option>
                  <option value="K">PENGELUARAN</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Kode Akun</label>
                <input type="text" class="form-control" value="<?php echo $kode_akun ?>" name="kdakun" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Akun</label>
                <input type="text" class="form-control" name="nmakun" id="exampleInputEmail1" placeholder="Enter Akun">
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" onClick="location.href=('<?php echo site_url('akun') ?>')" class="btn btn-danger">Cancel</button>
            </div>
          </form>
        </div>


      </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>