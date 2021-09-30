<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Edit Data User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('user/update') ?>" role="form">
                <div class="card-body">
                  <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Username</label> -->
                    <input type="hidden" class="form-control" value="<?php echo $usen ?>" name="usn" id="exampleInputEmail1" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?php echo $nmal ?>" name="nmleng" id="exampleInputEmail1" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" value="<?php echo $ps ?>" name="pass" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value="<?php echo $mail ?>" name="email" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No.Telpon</label>
                    <input type="text" class="form-control" value="<?php echo $telp ?>" name="notelp" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                        <label>Hak-Akses</label>
                        <select class="form-control" name="cbhak">
                          <?php if($hak=='1'){
                            echo"
                            <option value='1' selected>Pimpinan</option>
                            <option value='2'>Administrasi Keuangan</option>";                            
                          }else{
                            echo "
                            <option value='2' selected>Administrasi Keuangan</option>
                            <option value='1'>Pimpinan</option>";
                          }?>
                          
                        </select>
                      </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            

          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>