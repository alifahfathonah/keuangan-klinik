<script>
  function ambil1()
  {
    $('#myModal1').modal('hide');
  }
</script>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Pendapatan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <?php echo form_open('pendapatan/simpan',array('class'=>'form-horizontal'))?>
          <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('pendapatan/simpan') ?>" role="form">
            <div class="card-body">
              <div class="form-group">
                <!-- <label for="exampleInputEmail1">Kode Saldo</label> -->
                <input type="hidden" class="form-control" value="<?php echo $kode_tran ?>" name="kdtran" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" class="form-control" name="tglpend" value="<?php echo date('Y-m-d') ?>" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Akun</label>
                <select name="jna" class="form-control">
                  <option>-PILIH-</option>
                  <option value="M">PENDAPATAN</option>
                </select>
              </div>
              
            </div>

            <div class="card-footer">
              <button type="button" data-toggle="modal"data-target="#myModal1" class="btn btn-primary">Tambah</button>
              <button type="button" onClick="location.href=('<?php echo site_url('saldo') ?>')" class="btn btn-danger">Cancel</button>
            </div>
          
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>


<!-- Modal Konsumen -->
<div class="modal fade bs-example-modal-lg" id="myModal1" tabindex="-1" role="dialog" arialabelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="text-align: left;"aria-label="Close"><span ariahidden="true">&times;</span></button>
        <div class="box-body table-responsive">
          <h1 class="modal-title" id="myModalLabel">INPUT ITEM PENDAPATAN</h1>
          <br><br>
          <table class="table table-bordered table-striped table-hover" id="datatiket">
            <tr>
              <td height="50">Akun</td>
              <td><select class="form-control" name="cbakun">
                <option>-Pilih-</option>
                <?php foreach ($dataakun ->result_array() as $k) {?>
                <option value="<?php echo $k['kodeakun']?>"><?php echo $k['namaakun'] ?></option>
                <?php } ?>
              </select></td>
            </tr>
            <tr>
              <td>Jumlah</td>
              <td><input type="text" class="form-control" name="jumlah"></td>
            </tr>
            <input type="hidden" value="<?php echo $kda ?>" class="form-control" name="kdsal">
                <input type="hidden" value="<?php echo $sdak ?>" class="form-control" name="sda">

          </table>
          <button type="submit"class="btn btn-primary">Simpan</button>
        </div>
        </form>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->