<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data saldo</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('saldo/simpan') ?>" role="form">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" class="form-control" value="<?php echo $kode_saldo ?>" name="kdsaldo" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" class="form-control" name="tglsaldo" value="<?php echo date('Y-m-d') ?>" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Saldo Awal</label>
                <input type="text" class="form-control" name="saldoawl" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Saldo Akhir</label>
                <input type="text" value="<?php echo $sdak ?>" class="form-control" name="saldoakr" id="exampleInputEmail1" placeholder="0" readonly>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" onClick="location.href=('<?php echo site_url('saldo') ?>')" class="btn btn-danger">Cancel</button>
            </div>
          </form>
        </div>


      </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>