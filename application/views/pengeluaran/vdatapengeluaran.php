<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data pengeluaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('pengeluaran/tambahdata')?>')">
                    <i class="fa fa-plus"></i>Tambah Data
                </button><br><br>
                <?php echo $this->session->flashdata('pesan'); ?>
                <br><br>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Akun</th>
                  <th>Saldo</th>
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
                  <td><?php echo $baris['tglkeluar']?></td>
                  <td><?php echo $baris['namaakun']?></td>
                  <td><?php echo "Rp. ".number_format($baris['jumlah']) ?></td>
                  <td>
                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['kodetransaksikeluar']?>')">
                      <i class="nav-icon fas fa-trash"></i>
                    </button>
                    <script>
                      function hapus(kode){
                        pesan= confirm("Yakin data saldo ini di Hapus ?");
                        if(pesan){
                          location.href=('<?php echo site_url('pengeluaran/hapus/')?>'+kode);
                        }else{
                          return false;
                        }
                      }
                    </script>
                  </td>

                </tr>
                <input type="hidden" name="jumlahpen" value="<?php echo $baris['jumlah'] ?>">
                 <?php endforeach;?>             
            
          </table>
          <input type="hidden" name="kds" value="<?php echo $kda ?>">
          <input type="hidden" name="saldoak" value="<?php echo $sdak ?>">
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>