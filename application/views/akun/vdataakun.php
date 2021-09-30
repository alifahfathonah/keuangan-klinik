<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('akun/tambahdata')?>')">
                    <i class="fa fa-plus"></i>Tambah Data
                </button><br><br>
                <?php echo $this->session->flashdata('pesan'); ?>
                <br><br>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Kode Akun</th>
                  <th>Jenis Akun</th>
                  <th>Akun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            <?php
            $no = 0;
            foreach ($tampil->result_array() as $baris):
              $no++;
              if($baris['jenisakun']=='M'){
                $ak = 'PENDAPATAN';
              }else{
                $ak = 'PENGELUARAN';
              }
              ?>
              
             
                <tr>
                  <td><?php echo $baris['kodeakun']; ?></td>
                  <td><?php echo $ak; ?></td>
                  <td><?php echo $baris['namaakun']; ?></td>
                  <td>
                    <button type="button" class="btn bg-purple" onclick="location.href=('<?php echo site_url('akun/edit/'.$baris['kodeakun'])?>')">
                      <i class="nav-icon fas fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['kodeakun']?>')">
                      <i class="nav-icon fas fa-trash"></i>
                    </button>
                    <script>
                      function hapus(kode){
                        pesan= confirm("Yakin data akun ini di Hapus ?");
                        if(pesan){
                          location.href=('<?php echo site_url('akun/hapus/')?>'+kode);
                        }else{
                          return false;
                        }
                      }
                    </script>
                  </td>
                <?php endforeach;?>
                </tr>
                
              
                
                  
                            
            

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