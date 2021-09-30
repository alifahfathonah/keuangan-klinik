<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php 
    $a=$this->session->userdata('akses');
    if($a=='1'){
      $b = 'pimpinan';
    }else if ($a=='2'){
      $b='adm';
    }else {
      $b='keuangan';
    }

    ?>
    <li class="nav-item has-treeview">
      <a href="<?php echo site_url('home')?>" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Home                
        </p>
      </a>
    </li>
    <?php if($b=='adm'){ ?>
      <li class="nav-item">
            <a href="<?php echo site_url('user') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User                
              </p>
            </a>
          </li>
      <li class="nav-item has-treeview">
        <a href="<?php echo site_url('akun') ?>" class="nav-link">
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p>
            Akun              
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="<?php echo site_url('saldo') ?>" class="nav-link">
          <i class="nav-icon fas fa-hand-holding-usd"></i>
          <p>
            Saldo
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Transaksi
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo site_url('pendapatan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Transaksi Pendapatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('pengeluaran') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Transaksi Keluar</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-file-word"></i>
          <p>
            Laporan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lppen') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-red"></i>
              <p>Laporan Pendapatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lppeng') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-yellow"></i>
              <p>Laporan Pengeluaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lplabarugi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-green"></i>
              <p>Laporan Laba & Rugi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lprekap') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-blue"></i>
              <p>Laporan Rekapitulasi</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpsaldo') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-orange"></i>
              <p>Laporan Saldo</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpakun') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-orange"></i>
              <p>Laporan Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpuser') ?>" target="_blank" class="nav-link">
              <i class="far fa-circle nav-icon text-purple"></i>
              <p>Laporan User</p>
            </a>
          </li>         
        </ul>
      </li>
      
        <?php
          }else if($b=='pimpinan'){ ?>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-file-word"></i>
          <p>
            Laporan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lppen') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-red"></i>
              <p>Laporan Pendapatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lppeng') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-yellow"></i>
              <p>Laporan Pengeluaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lplabarugi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-green"></i>
              <p>Laporan Laba & Rugi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lprekap') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-blue"></i>
              <p>Laporan Rekapitulasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpsaldo') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-orange"></i>
              <p>Laporan Saldo</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpakun') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-orange"></i>
              <p>Laporan Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpuser') ?>" target="_blank" class="nav-link">
              <i class="far fa-circle nav-icon text-purple"></i>
              <p>Laporan User</p>
            </a>
          </li>
        </ul>   
        </li>       
          
        <?php }else{ ?>
      <li class="nav-item has-treeview">
        <a href="<?php echo site_url('akun') ?>" class="nav-link">
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p>
            Akun              
          </p>
        </a>
      </li>
      
      <li class="nav-item has-treeview">
        <a href="<?php echo site_url('saldo') ?>" class="nav-link">
          <i class="nav-icon fas fa-hand-holding-usd"></i>
          <p>
            Saldo
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Transaksi
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo site_url('pendapatan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Transaksi Pendapatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('pengeluaran') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Transaksi Keluar</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-file-word"></i>
          <p>
            Laporan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lppen') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-red"></i>
              <p>Laporan Pendapatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lppeng') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-yellow"></i>
              <p>Laporan Pengeluaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lplabarugi') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-green"></i>
              <p>Laporan Laba & Rugi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lprekap') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-blue"></i>
              <p>Laporan Rekapitulasi</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpakun') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-orange"></i>
              <p>Laporan Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpsaldo') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-orange"></i>
              <p>Laporan Saldo</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('laporan/lpuser') ?>" target="_blank" class="nav-link">
              <i class="far fa-circle nav-icon text-purple"></i>
              <p>Laporan User</p>
            </a>
          </li>         
        </ul>
      </li>
        <?php } ?>
        <li class="nav-header">Setting</li>
        <li class="nav-item">
          <a href="<?php echo site_url('log/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p class="text">LogOut</p>
          </a>
        </li>
    </ul>
  </nav>
      <!-- /.sidebar-menu -->