<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Saldo</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('saldo/tambahdata')?>')">
                    <i class="fa fa-plus"></i>Tambah Data
                </button><br><br>
                <?php echo $this->session->flashdata('pesan'); ?>
                <br><br>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Saldo Awal</th>
                  <th>Saldo Akhir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            <?php
            $no = 0;
            foreach ($tampil->result_array() as $baris):
              $no++;
              
              ?>
              
              
                <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $baris['tglsaldo']?></td>
                  <td><?php echo "Rp. ".number_format($baris['saldoawal']) ?></td>
                  <td><?php echo "Rp. ".number_format($baris['saldoakhir']) ?></td>
                  <td>
                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['kodesaldo']?>')">
                      <i class="nav-icon fas fa-trash"></i>
                    </button>
                    <script>
                      function hapus(kode){
                        pesan= confirm("Yakin data saldo ini di Hapus ?");
                        if(pesan){
                          location.href=('<?php echo site_url('saldo/hapus/')?>'+kode);
                        }else{
                          return false;
                        }
                      }
                    </script>
                  </td>

                </tr>
                 <?php endforeach;?> 
                         
            

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>