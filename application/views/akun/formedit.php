<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Edit Data Akun</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('akun/update') ?>" role="form">
            <div class="card-body">
              <div class="form-group">
                <label>Jenis Akun</label>
                <select class="form-control" name="jnakun">
                  <?php if($jna=='M'){
                    echo "
                    <option value='M' selected>PENDAPATAN</option>
                    <option value='K'>PENGELUARAN</option>
                    ";
                  }else {
                    echo "
                    <option value='K' selected>PENGELUARAN</option>
                    <option value='M'>PENDAPATAN</option>                    
                    ";
                  } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Kode Akun</label>
                <input type="text" class="form-control" value="<?php echo $kda ?>" name="kdakun" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Akun</label>
                <input type="text" class="form-control" name="nmakun" value="<?php echo $nma ?>" id="exampleInputEmail1" placeholder="Enter email">
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