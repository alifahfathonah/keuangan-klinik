<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('user/tambahdata')?>')">
                    <i class="fa fa-plus"></i>Tambah Data
                </button><br><br>
                <?php echo $this->session->flashdata('pesan'); ?>
                <br><br>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>No.Telp</th>
                  <th>Foto</th>
                  <th>Hak-Akses</th>
                  <th>AKsi</th>
                </tr>
              </thead>
            <?php
            $no = 0;
            foreach ($tampil->result_array() as $baris):
              $no++;
              if($baris['hakakses']=='1'){
                $hak = 'Pimpinan';
              }else{
                $hak = 'Administrasi Keuangan';
              }
              ?>
              
              
                <tr>
                  <td><?php echo $baris['username'] ?></td>
                  <td><?php echo $baris['namalengkap'] ?></td>
                  <td><?php echo $baris['email'] ?></td>
                  <td><?php echo $baris['notelp'] ?></td>
                  <td><img width="50" height="60" src="<?php echo base_url('uploads/').$baris['foto'] ?>"></td>                    
                  <td><?php echo $hak ?></td>
                  <td>
                    <button type="button" class="btn bg-purple" onclick="location.href=('<?php echo site_url('user/edit/'.$baris['username'])?>')">
                      <i class="nav-icon fas fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['username']?>')">
                      <i class="nav-icon fas fa-trash"></i>
                    </button>
                    <script>
                      function hapus(kode){
                        pesan= confirm("Yakin data user ini di Hapus ?");
                        if(pesan){
                          location.href=('<?php echo site_url('user/hapus/')?>'+kode);
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