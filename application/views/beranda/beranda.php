<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h4>Pendapatan<hr></h4>
          <?php
          $no = 0;
          $totalsemua=0;
          foreach ($tampil1->result_array() as $baris):
            $no++;
            $totalsemua = $totalsemua+$baris['jumlah'];
            ?><?php endforeach; ?>
            <h4><?php echo"Rp.".number_format($totalsemua)?></h4>
          

        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?php echo site_url('pendapatan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h4>Pengeluaran<hr></h4>
          <?php
          $no = 0;
          $totalsemua=0;
          foreach ($tampil2->result_array() as $baris):
            $no++;
            $totalsemua = $totalsemua+$baris['jumlah'];
            ?><?php endforeach; ?>
            <h4><?php echo"Rp.".number_format($totalsemua)?></h4>
          
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo site_url('pengeluaran') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h4>Saldo<hr></h4>
          <?php
          $no = 0;
          $totalsemua=0;
          foreach ($tampil3->result_array() as $baris):
            $no++;
            $totalsemua = $baris['saldoakhir'];
            ?>
            <?php endforeach; ?>
            <h4><?php echo"Rp.".number_format($totalsemua)?></h4>
          
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo site_url('saldo') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <marquee><h3 class="card-title">Selamat Datang di Clinik Cempaka Indah</h3></marquee>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <img width="200" height="250" src="<?php echo base_url('asset1/')?>images/logo.png">
          <font style="font-size: 40px;font-family: sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clinik Cempaka Indah</font>
        </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>